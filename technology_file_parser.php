<?php
function LoadGlobalVars(): array
{
    $vars = array();
    $files = glob("tech/*.txt");
    foreach ($files as $file) {
        $lines = explode("\n", file_get_contents($file));

        foreach ($lines as $lineNumber => $lineRaw) {
            $line = trim($lineRaw);

            if ($line == "") {
                continue;
            }

            if (StartsWith($line, "#")) {
                continue;
            }

            if (StartsWith($line, "@")) {
                $varValues = explode("=", $line);
                $varName = trim(str_replace("@", "", $varValues[0]));
                $varValue = trim($varValues[1]);
                $vars[$varName] = $varValue;
                continue;
            }
        }
    }
    return $vars;
}

function LoadTechnology(): Node
{
    $brackets = 0;
    $baseNode = new Node();
    $currentNodes = array(@$baseNode);

    $files = glob("tech/*.txt");
    foreach ($files as $file) {
        $lines = explode("\n", file_get_contents($file));

        $unprocessedLines = array();

        foreach ($lines as $lineNumber => $lineRaw) {
            $line = trim($lineRaw);

            if ($line == "") {
                continue;
            }

            if (StartsWith($line, "#")) {
                continue;
            }

            if (StartsWith($line, "@")) {
                continue;
            }

            $length = strlen($line);
            $potentialName = "";
            $foundEqualsCharacter = false;
            $bracketsFound = false;
            $sameLineBracketStartAndEnd = false;
            $nodeContent = "";

            for ($i = 0; $i < $length; $i++) {
                $char = $line[$i];
                if ($char == "=") {
                    $foundEqualsCharacter = true;
                    $potentialName = trim($potentialName);
                }
                if (!$foundEqualsCharacter) {
                    $potentialName .= $char;
                }
                if ($char == "{") {
                    $brackets++;
                    $newNode = new Node();
                    $newNode->name = $potentialName;
                    $currentNodes[$brackets] = @$newNode;
                    $currentNodes[$brackets - 1]->children[] = @$newNode;
                    $bracketsFound = true;
                    $sameLineBracketStartAndEnd = true;
                    $nodeContent = "";
                    continue;
                }
                if ($char == "}") {
                    if ($sameLineBracketStartAndEnd) {
                        $currentNodes[$brackets]->nodeValue = trim($nodeContent);
                    }
                    $brackets--;
                    $bracketsFound = true;
                    continue;
                }
                $nodeContent .= $char;
            }

            if (!$bracketsFound) {
                $varValues = explode("=", $line);
                if (count($varValues) == 2) {
                    $simpleVarName = trim($varValues[0]);
                    $simpleVarValue = trim($varValues[1]);
                    $currentNodes[$brackets]->vars[$simpleVarName] = $simpleVarValue;
                    continue;
                }
            }

            $line = $brackets . ": " . $line;
            $unprocessedLines[] = $line;
        }
    }
    return $baseNode;
}

?>