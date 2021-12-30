<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <title> Chart emulation </title>

    <style>
        .haveTechnology {
            background-color: palegreen;
            color: darkgreen;
        }

    </style>
</head>
<body>

<?php

require_once("helpers.php");
require_once("localisation_file_parser.php");
require_once("technology_file_parser.php");

$researchedTechnologies = ["Supersolid Materials", "Nanomechanics", "Nanocomposite Materials", "Crystal-Infused Plating", "Chemical Thrusters", "Industrial Base", "Mechanized Mining", "Nanomechanics", "Offworld Construction", "Weather Control Systems", "Mass Drivers", "Flak Battery", "Nuclear Missiles", "Orbital Trash Dispersal", "Micro-Replicators", "Space Exploration", "Scientific Method", "Starbase Construction", "Offworld Construction", "Interplanetary Expeditionary Forces", "Planetary Defenses", "Ceramo-Metal Materials", "Nanocomposite Materials", "Ion Thrusters", "Chemical Thrusters", "Powered Exoskeletons", "Industrial Base", "Zero-G Refineries", "Offworld Construction", "Geothermal Fracking", "Industrial Base", "Holographic Casts", "Industrial Base", "Supersolid Materials", "Nanomechanics", "Afterburners", "Chemical Thrusters", "Assembly Patterns", "Nanomechanics", "Anti-Gravity Engineering", "Weather Control Systems", "Coilguns", "Mass Drivers", "Flak Battery", "Space Torpedoes", "Nuclear Missiles", "Offworld Construction", "Exotic Gas Extraction", "Offworld Construction", "Exotic Gas Refining", "Industrial Base", "Rare Crystal Mining", "Offworld Construction", "Industrial Base", "Micro-Replicators", "Starport", "Starbase Construction", "Plasteel Materials", "Ceramo-Metal Materials", "Ion Thrusters", "Deep Space Defenses", "Starbase Construction", "Long-Range Mineral Scanners", "Zero-G Refineries", "Deep Core Mining", "Geothermal Fracking", "Mineral Purification", "Geothermal Fracking", "Ceramo-Metal Alloys", "Holographic Casts", "Ceramo-Metal Materials", "Supersolid Materials", "Powered Exoskeletons", "Assembly Patterns", "Railguns", "Coilguns", "Fusion Missiles", "Nuclear Missiles", "Fusion Power", "Space Torpedoes", "Machine Template System", "Powered Exoskeletons", "Orbital Energy Conversion", "Starport", "Corvettes", "Starport", "Starhold", "Starport", "Carrier Operations", "Starport", "Plasteel Materials", "Mineral Cutting Beams", "Long-Range Mineral Scanners", "Deep Core Mining", "Mineral Purification", "Colonial Centralization", "Holographic Casts", "Colonial Centralization", "Afterburners", "Plasteel Materials", "Railguns", "Antimatter Missiles", "Fusion Missiles", "Binary Motivators", "Colonial Centralization", "Machine Template System", "Destroyers", "Corvettes", "Standardized Corvette Patterns", "Corvettes", "Star Fortress", "Starhold", "Orbital Habitats", "Starhold", "Modular Engineering", "Starhold", "Carrier Operations", "Starhold", "Mineral Cutting Beams", "Ceramo-Metal Alloys", "Galactic Administration", "Positronic AI", "Antimatter Missiles", "Binary Motivators", "Galactic Administration", "Binary Motivators", "Galactic Administration", "Cruisers", "Destroyers", "Standardized Destroyer Patterns", "Destroyers", "Improved Destroyer Hulls", "Destroyers", "Citadel", "Star Fortress", "Orbital Habitats", "Star Fortress", "Modular Engineering", "Battleships", "Cruisers", "Improved Destroyer Hulls", "Standardized Cruiser Patterns", "Cruisers", "Citadel", "Battleships", "Citadel", "Battleships", "Citadel", "Battleships", "Zero Point Power", "Scientific Method", "Quantum Theory", "Automated Exploration Protocols", "Fission Power", "Gravitic Sensors", "High-Energy Capacitors", "\$building_bio_reactor\$", "Red Lasers", "Active Countermeasures", "Gravitic Sensors", "Exotic Materials Labs", "Scientific Method", "Zero-G Laboratories", "Offworld Construction", "Applied Quantum Physics", "Quantum Theory", "Administrative AI", "Scientific Method", "Fusion Power", "Fission Power", "Reactor Boosters", "Fission Power", "Deflectors", "Scientific Method", "Subspace Sensors", "Gravitic Sensors", "Field Modulation", "High-Energy Capacitors", "Global Energy Management", "High-Energy Capacitors", "Hyperspace Travel", "Scientific Method", "Blue Lasers", "Red Lasers", "Active Countermeasures", "Mote Stabilization", "Offworld Construction", "Volatile Material Plants", "Industrial Base", "Miniature Containment Fields", "Zero-G Laboratories", "Applied Quantum Physics", "Self-Evolving Logic", "Administrative AI", "Specialized Combat Computers", "Administrative AI", "Cold Fusion Power", "Fusion Power", "Improved Reactor Boosters", "Fusion Power", "Reactor Boosters", "Improved Deflectors", "Deflectors", "Subspace Sensors", "Quantum Energy States", "Field Modulation", "Hyperlane Breach Points", "Hyperspace Travel", "FTL Inhibition", "Hyperspace Travel", "Blue Lasers", "Applied Quantum Physics", "UV Lasers", "Blue Lasers", "Plasma Throwers", "Blue Lasers", "Disruptors", "Blue Lasers", "Exotic Materials Labs", "Colonial Centralization", "Exotic Materials Labs", "Colonial Centralization", "Quantum Probes", "Miniature Containment Fields", "AI-Controlled Colony Ships", "Administrative AI", "New Worlds Protocol", "Positronic AI", "Self-Evolving Logic", "Extended Combat Algorithms", "Specialized Combat Computers", "Self-Evolving Logic", "Auxiliary Fire-control", "Specialized Combat Computers", "Self-Evolving Logic", "Antimatter Power", "Cold Fusion Power", "Shields", "Improved Deflectors", "Quantum Energy States", "Planetary Power Grid", "Global Energy Management", "Colonial Centralization", "Hyperspace Slipstreams", "Hyperlane Breach Points", "Quantum Energy States", "X-Ray Lasers", "UV Lasers", "Plasma Throwers", "Disruptors", "Hyperspace Slipstreams", "Autonomous Station Protocols", "Quantum Probes", "Self-Evolving Logic", "AI-Controlled Colony Ships", "Extended Combat Algorithms", "Positronic AI", "Extended Combat Algorithms", "Self-Evolving Logic", "Quantum Theory", "Colonial Bureaucracy", "Quantum Theory", "Colonial Bureaucracy", "Zero Point Power", "Antimatter Power", "Improved Reactor Boosters", "Advanced Shields", "Shields", "Shield Capacitors", "Shields", "Planetary Shields", "Shields", "X-Ray Lasers", "Zero Point Power", "Autonomous Station Protocols", "Applied Quantum Physics", "Advanced Shields", "Zero Point Power", "Advanced Shields", "X-Ray Lasers", "Battleships", "Planetary Defenses", "Industrial Agriculture", "Biodiversity Studies", "Genome Mapping", "Regenerative Hull Tissue", "Doctrine Space Combat", "Interstellar Fleet Traditions", "Doctrine Fleet Support", "Centralized Command", "Stellar Expansion", "Planetary Government", "Sociocultural History", "Amoeba Breeding Program", "Eco Simulation", "Industrial Agriculture", "Hydroponics Farming", "Industrial Agriculture", "Xenobiology", "Biodiversity Studies", "Genome Mapping", "Doctrine Reactive Formations", "Doctrine Space Combat", "Refit Standards", "Interstellar Fleet Traditions", "Doctrine Support Vessels", "Doctrine Fleet Support", "Centralized Command", "Ground Defense Planning", "Planetary Defenses", "Stellar Expansion", "Planetary Unification", "Planetary Government", "Genome Mapping", "Idyllic Architecture", "Weather Control Systems", "Sociocultural History", "Stellar Expansion", "Gene Crops", "Eco Simulation", "Xenobiology", "New Worlds Protocol", "Space Exploration", "Doctrine Interstellar Warfare", "Doctrine Reactive Formations", "Refit Standards", "Doctrine Support Vessels", "Global Defense Grid", "Ground Defense Planning", "Colonial Centralization", "Planetary Unification", "Adaptive Bureaucracy", "Planetary Unification", "Subspace Sensors", "Colonial Centralization", "Gene Crops", "New Worlds Protocol", "Genome Mapping", "New Worlds Protocol", "Selective Defoliants", "New Worlds Protocol", "Doctrine Fluid Fleet Templates", "Doctrine Interstellar Warfare", "Galactic Administration", "Colonial Centralization", "Ceramo-Metal Infrastructure", "Colonial Centralization", "Ceramo-Metal Materials", "Holographic Casts", "Colonial Centralization", "Effective Bureaucracy", "Adaptive Bureaucracy", "Colonial Bureaucracy", "Adaptive Bureaucracy", "Colonial Centralization", "Administrative AI", "Colonial Centralization", "Gene Crops", "Colonial Centralization", "Doctrine Fluid Fleet Templates", "Galactic Administration", "Ceramo-Metal Infrastructure", "Galactic Bureaucracy", "Colonial Bureaucracy", "Galactic Administration", "Galactic Bureaucracy"];

$vars = LoadGlobalVars();
$localisation = LoadLocalisation();
$baseNode = LoadTechnology();

$researchAreas = array();
$techsByResearchArea = array();

//find research areas
foreach ($baseNode->children as $techIndex => $technology) {
    $technology = CastToNode($technology);
    $researchArea = $technology->vars["area"];
    $researchName = $technology->name;
    if (array_search($researchArea, $researchAreas) === false) {
        $researchAreas[] = $researchArea;
    }
    $techsByResearchArea[$researchArea][$researchName] = @$technology;
}

//determine dependency depth, predecessors and successors
$updateHappened = true;
$maxPrerequisiteTechDependencyTier = 0;
while ($updateHappened) {
    $updateHappened = false;

    foreach ($researchAreas as $researchAreaIndex => $researchArea) {
        $techsInResearchArea = FilterByArea($baseNode->children, $researchArea);
        foreach ($techsInResearchArea as $technologyIndex => $technology) {
            $technology = CastToNode($technology);
            $technologyName = $technology->name;

            $prerequisites = array();
            if ($technology->HasChild("prerequisites")) {
                $technologyPrerequisites = $technology->GetChild("prerequisites")->nodeValue;
                $prerequisitesValues = explode(" ", $technologyPrerequisites);
                foreach ($prerequisitesValues as $prerequisiteIndex => $prerequisite) {
                    $prerequisite = str_replace("\"", "", $prerequisite);
                    if (trim($prerequisite) != "") {
                        $prerequisites[] = trim($prerequisite);
                    }
                }
            }
            $technology->varsLists["predecessors"] = $prerequisites;

            if (!isset($technology->vars["tech_dependency_tier"])) {
                $technology->vars["tech_dependency_tier"] = 0;
            }
            foreach ($prerequisites as $prerequisiteIndex => $prerequisite) {
                $prerequisiteTechnology = GetTechByName($prerequisite);

                $prerequisiteTechnologySuccessors = $prerequisiteTechnology->GetVarLists("successors", array());
                if (array_search($technologyName, $prerequisiteTechnologySuccessors) === false) {
                    $prerequisiteTechnologySuccessors[] = $technologyName;
                    $prerequisiteTechnology->varsLists["successors"] = $prerequisiteTechnologySuccessors;
                }

                $prerequisiteTechDependencyTier = $prerequisiteTechnology->GetVar("tech_dependency_tier", 0);
                if (intval($prerequisiteTechDependencyTier) + 1 > $technology->vars["tech_dependency_tier"]) {
                    $technology->vars["tech_dependency_tier"] = intval($prerequisiteTechDependencyTier) + 1;
                    $maxPrerequisiteTechDependencyTier = max($maxPrerequisiteTechDependencyTier, intval($prerequisiteTechDependencyTier) + 1);
                    $updateHappened = true;
                }
            }
        }
    }
}

//Mark already researched technologies
foreach ($baseNode->children as $techIndex => $technology) {
    $technology = CastToNode($technology);
    $researchName = $technology->name;
    $localisedName = GetLocalisation($researchName);
    $technology->vars["is_researched"] = "no";
    if (array_search($localisedName, $researchedTechnologies) !== FALSE) {
        $technology->vars["is_researched"] = "yes";
    }
}


foreach ($researchAreas as $researchAreaIndex => $researchArea) {
    $techsInResearchArea = FilterByArea($baseNode->children, $researchArea);
    print "<h2>$researchArea</h2>";
    print "<table>";
    print "<tr>";
    for ($printingTechDependencyTier = 0; $printingTechDependencyTier < $maxPrerequisiteTechDependencyTier; $printingTechDependencyTier++) {
        print "<td>Tier $printingTechDependencyTier</td>";
    }
    print "</tr><tr>";
    for ($printingTechDependencyTier = 0; $printingTechDependencyTier < $maxPrerequisiteTechDependencyTier; $printingTechDependencyTier++) {
        print "<td>";
        print "<ul>";
        foreach ($techsInResearchArea as $technologyIndex => $technology) {
            $technology = CastToNode($technology);

            $techDependencyTier = $technology->GetVar("tech_dependency_tier");
            if ($techDependencyTier != $printingTechDependencyTier) {
                continue;
            }

            $technologyName = $technology->name;
            $technologyIsRare = $technology->GetVar("is_rare", "no") == "yes";

            $successors = $technology->GetVarLists("successors", array());
            $predecessors = $technology->GetVarLists("predecessors", array());

            print RenderTechName($technologyName);
            if (count($predecessors) > 0) {
                print "<dd>Requires:</dd>";
                foreach ($predecessors as $predecessorIndex => $predecessor) {
                    print "<dd><li>" . RenderTechName($predecessor) . "</li></dd>";
                }
            }
            if (count($successors) > 0) {
                print "<dd>Unlocks:</dd>";
                foreach ($successors as $successorIndex => $successor) {
                    print "<dd><li>" . RenderTechName($successor) . "</li></dd>";
                }
            }
        }
        print "</ul>";
        print "</td>";
    }
    print "</tr>";
    print "</table>";
}

/*
print "<ul>";
foreach ($baseNode->children as $techIndex => $technology) {
    print "<li>" . $technology->name . "</li>";
}
print "</ul>";
*/

//print_re($vars, "Global Vars");
//print_re($baseNode, "Node");

class Node
{
    public $name = "Not set";
    public $nodeValue = null; //for nodes like: prerequisites = { "tech_titans" }
    public $vars = array();
    public $varsLists = array();
    public $children = array();

    public function GetVar(string $varName, string $default = null): string
    {
        if (isset($this->vars[$varName])) {
            return $this->vars[$varName];
        } else {
            return $default;
        }
    }

    public function GetVarLists(string $varName, array $default = null): array
    {
        if (isset($this->varsLists[$varName])) {
            return $this->varsLists[$varName];
        } else {
            return $default;
        }
    }

    public function GetChild(string $nodeName): Node
    {
        foreach ($this->children as $childIndex => $child) {
            $child = CastToNode($child);
            if ($child->name == $nodeName) {
                return $child;
            }
        }
    }

    public function HasChild(string $nodeName): bool
    {
        foreach ($this->children as $childIndex => $child) {
            $child = CastToNode($child);
            if ($child->name == $nodeName) {
                return true;
            }
        }
        return false;
    }
}

function CastToNode(&$param): Node
{
    return $param;
}

function FilterByArea(array &$array, string $area)
{
    return array_filter($array, fn(Node $x) => $x->vars["area"] == $area);
}

function GetTechByName(string $technologyName): Node
{
    global $techsByResearchArea;
    foreach ($techsByResearchArea as $technologyAreaIndex => $technologyArea) {
        foreach ($technologyArea as $technologyIndex => $technology) {
            $technology = CastToNode($technology);
            if ($technology->name == $technologyName) {
                return $technology;
            }
        }
    }
    print "Tech not found: $technologyName";
}

function GetLocalisation(string $localisationKey, string $default = null): string
{
    global $localisation;

    if (isset($localisation[$localisationKey])) {
        return $localisation[$localisationKey];
    }

    return $default;
}

function GetTechAreaOfTechByName(string $technologyName): string
{
    global $techsByResearchArea;
    foreach ($techsByResearchArea as $technologyAreaIndex => $technologyArea) {
        foreach ($technologyArea as $technologyIndex => $technology) {
            $technology = CastToNode($technology);
            if ($technology->name == $technologyName) {
                return $technologyAreaIndex;
            }
        }
    }
    print "Tech not found: $technologyName";
}

function IsTechRare(string $technologyName): bool
{
    $technology = GetTechByName($technologyName);
    return $technology->GetVar("is_rare", "no") == "yes";
}

function IsTechnologyResearched(string $technologyName): bool
{
    $technology = GetTechByName($technologyName);
    return $technology->GetVar("is_researched", "no") == "yes";
}

function RenderTechName(string $technologyName): string
{
    $render = "";
    $render .= "<div style='display: block; cursor: pointer;' onclick='ToggleOwnership(\"$technologyName\")'";
    if (IsTechnologyResearched($technologyName)) {
        $render .= " class='haveTechnology' ";
    }
    $render .= ">";
    $render .= "<table><tr><td>";
    $render .= "<img src='icons/techarea/" . GetTechAreaOfTechByName($technologyName) . ".png' />";
    $render .= "</td><td>";
    if (IsTechRare($technologyName)) {
        $render .= "<span style='color: purple' ><b>Rare </b></span>";
    }
    $render .= "<span class='$technologyName'>";
    $render .= "<b>" . GetLocalisation($technologyName, $technologyName) . "</b>";
    $render .= "</td></tr></table>";
    $render .= "</div>";
    return $render;
}


?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
    $(document).ready(function () {

    });

    function ToggleOwnership(technologyName) {
        $("." + technologyName).toggleClass("haveTechnology");
    }
</script>
</body>
</html>