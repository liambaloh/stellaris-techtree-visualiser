<?php
function LoadLocalisation(): array
{
    $localisation = array();
    $localisationFiles = glob("loc/*.yml");
    foreach ($localisationFiles as $localisationFile) {
        //print "<br>Files: " . $localisationFile;
        $yamlLocalisationLinesRaw = explode("\n", file_get_contents($localisationFile));
        $yamlLocalisationLines = array();
        foreach ($yamlLocalisationLinesRaw as $yamlLocalisationLinesRawIndex => $line) {
            if (trim($line) == "") {
                continue;
            }
            if (StartsWith(trim($line), "#")) {
                continue;
            }

            $hashLocation = strpos($line, "#");
            if ($hashLocation > 0) {
                $line = substr($line, 0, $hashLocation);
            }

            $colonParts = explode(":", $line);
            $colonName = $colonParts[0];
            $colonValue = "";
            if (count($colonParts) == 2) {
                $colonValue = substr($colonParts[1], 2); //remove the number and whitespace after colon, example: materials:0 "Materials"
                $colonValue = str_replace("\"", "", $colonValue);
            }
            if (count($colonParts) > 2) {
                $colonParts[1] = substr($colonParts[1], 2); //remove the number and whitespace after colon, example: materials:0 "Materials"
                $colonPartsValue = $colonParts;
                $colonPartsValue[0] = "";
                foreach ($colonPartsValue as $i => $colonPart) {
                    $colonPartsValue[$i] = str_replace("\"", "", $colonPart);
                }
                $colonValue = implode("", $colonPartsValue);
            }

            $line = "$colonName:" . (trim($colonValue) != "" ? " \"" . $colonValue . "\"" : "");

            $yamlLocalisationLines[] = $line;
        }

        $yamlFileContent = implode("\n", $yamlLocalisationLines);

        //print_re($yamlFileContent, $localisationFile);
        $localisationFileArray = yaml_parse($yamlFileContent);
        $localisation = array_merge($localisation, $localisationFileArray["l_english"]);
    }
    return $localisation;
}

?>