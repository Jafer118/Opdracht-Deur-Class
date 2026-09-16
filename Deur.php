<?php

class Deur {
    private bool $opSlot;
    private bool $deuropening;
    public string $deurNaam;

    public function __construct($deurNaam) {
        $this->opSlot = true; // De deur is op slot en moet worden geopend met een sleutel
        $this->deuropening = false; // De deur is dicht en moet met de klink worden opengemaakt
        $this->deurNaam = $deurNaam; // De deur krijgt de opgegeven naam
    }

    public function sleutelGebruiken($richting) {
        switch($richting) {
            case "links":
                $this->opSlot = false;
                return "Deur is ontgrendeld";
            case "rechts":
                $this->opSlot = true;
                return "Deur is weer op slot gedaan";
            default:
                return "Onbekende richting voor de sleutel.";
        }
    }

    public function deurOpenen() {
        if ($this->opSlot) {
            return "Deur is nog op slot en kan niet open";
        }
        
        $this->deuropening = true;
        return "Deur is geopend!";
    }

    public function doorDeurLopen() {
        // Alleen wanneer de deur ontgrendeld en open is, kun je door de deur lopen.
        if ($this->opSlot || !$this->deuropening) {
            return "Je stoot tegen de " . $this->deurNaam . "!";
        }
        
        return "Je bent in je huiskamer!";
    }
}


// HOOFDPROGRAMMA (De persoon / index)


// Scenario A: Normale werking (zoals in Verwachte output.png)
$voordeur = new Deur("Voordeur");
echo $voordeur->sleutelGebruiken("links") . "<br>";
echo $voordeur->deurOpenen() . "<br>";
echo $voordeur->doorDeurLopen() . "<br>";

echo "<br><hr><br>";

// Scenario B: Foutmelding deel 1 (zoals in Verwachte foutmelding pt.1.png)
$voordeur2 = new Deur("Voordeur");
echo $voordeur2->sleutelGebruiken("links") . "<br><br>";
echo $voordeur2->doorDeurLopen() . "<br>";

echo "<br><hr><br>";

// Scenario C: Foutmelding deel 2 (zoals in Verwachte foutmelding pt.2.png)
$voordeur3 = new Deur("Voordeur");
echo $voordeur3->deurNaam . " is nog op slot<br>";
echo $voordeur3->deurOpenen() . "<br>";
echo $voordeur3->doorDeurLopen() . "<br>";

?>