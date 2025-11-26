<?php
$naam = "Meron";

// We kunnen dit direct invullen.
$html ="<h1>{$naam}</h1>";

// Maar we kunnen ook een functie definiëren die we vaker kunnen gebruiken.
function titel($titelTekst) {
  return "<h1>{$titelTekst}</h1>";
}

// We plakken nu het resultaat van de functie titel aan de variabele $html
// en slaan dit op in de variabele $html
$html = $html . titel($naam);

$voornaam = $_GET['voornaam'];

echo "<br>Hallo, " . $voornaam . "<br>";


$einddatum = new DateTimeImmutable("2025-12-11 18:00:00 Europe/London");
$nu = new DateTimeImmutable("now");
$interval = $nu->diff($einddatum);
echo "het duurt nog". $interval->format("%a dagen en %H:%I:%S"), "\n". "tot sinterklaas";

$getallen = [1,2,3,4,5,6,7,8,9,10];

echo "<br>" . $getallen[0] . "<br>";


?>
<!DOCTYPE html>
<html>
  <body>
    <?=$html?>

  </body>
</html>
