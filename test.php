<?php
    $voornaam = "Arjan";
    
    $achternaam = "de Ruijter";

    echo "Mijn naam is: " . $voornaam . " " . $achternaam . "<br>";


    class Persoon 
    {
        public $voornaam;
        public $achternaam;

        public function __construct($voornaam = 'Remco', $achternaam = 'de Vries')
        {
            $this->voornaam = $voornaam;
            $this->achternaam = $achternaam;
        }
    }

    $persoon1 = new Persoon();
    $persoon1->voornaam = "Bert";
    $persoon1->achternaam = "de Vries";

    // var_dump($persoon1);

    echo "Mijn naam is: " . $persoon1->voornaam . " " . $persoon1->achternaam . "<br>";

    $persoon2 = new Persoon('Harry', 'van Meteren');
    echo "Mijn naam is: " . $persoon2->voornaam . " " . $persoon2->achternaam . "<br>";


?>