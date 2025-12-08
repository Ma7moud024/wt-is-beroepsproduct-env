<?php
require_once 'db_connectie.php';

$query = $verbinding ->query('SELECT stuknr, titel, genrenaam, n.naam
FROM stuk s LEFT OUTER JOIN Componist n ON s.componistId = n.componistId');
$resultraten = $query -> fetchAll();
echo '<pre>' ,print_r($resultraten), '</pre>';

$naam = "Meron";

// We kunnen dit direct invullen.
$html = "<h1>{$naam}</h1>";

// Maar we kunnen ook een functie definiëren die we vaker kunnen gebruiken.
function titel($titelTekst)
{
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
echo "het duurt nog" . $interval->format("%a dagen en %H:%I:%S"), "\n" . "tot sinterklaas";

$eenTMTien = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$zesTMVijftien = [6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
$samengevoegd = array_merge($eenTMTien, $zesTMVijftien);

print_r($samengevoegd);

echo "<br>" . $eenTMTien[0] . "<br>";

$film = [
  [
    'titel' => 'magmoud',
    'jaar' => 39994,
    'regiseur' => 'jan',
    'hoofdrolspeler' => 'peter'
  ],
  [
    'titel' => 'magmoud',
    'jaar' => 39994,
    'regiseur' => 'jan',
    'hoofdrolspeler' => 'peter'
  ],
  [
    'titel' => 'magmoud',
    'jaar' => 39994,
    'regiseur' => 'jan',
    'hoofdrolspeler' => ['peter']
  ]
];

echo $film[2]['hoofdrolspeler'][0];

$eten = [
  ['shaorma' => "vlees"],
  ['appels' => 10.95],
  ['tabouleh' => 8.95],
  ['hamburg' => 5.50]

];

$eten1 = [
  [
    'naam' => 'shaorma',
    'prijs' => 6.95
  ],
  [
    'naam' => 'appels',
    'prijs' => 10.95
  ]
];



?>
<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8" />
  <title>Restaurantmenu</title>
  <style>
    td:first-child {
      width: 8em;
    }

    td:nth-child(2) {
      font-style: italic;
      text-align: right;
      width: 4em;
    }
  </style>
</head>

<body>
  <h1>Menu</h1>

  <h2>Eten</h2>
  <table>
    <?php
    foreach ($eten1 as $item) {
      echo "<tr><td>{$item['naam']}</td><td>&euro;" . $item['prijs'] . "</td></tr>";
    }

    ?>
  </table>

  <h2>Drinken</h2>
  <table>
    <tr>
      <td>Cola</td>
      <td>&euro; 2.00</td>
    </tr>
    <tr>
      <td>Ayran</td>
      <td>&euro; 2.30</td>
    </tr>
    <tr>
      <td>Fernandes</td>
      <td>&euro; 2.50</td>
    </tr>
    <tr>
      <td>Bier</td>
      <td>&euro; 5.50</td>
    </tr>
  </table>

</body>

</html>


<!-- 
Beschrijf in je eigen woorden wat een DNS-server doet? domain name server zet gevraagde domeinnaam om in ip adres
Bevat de default gateway een MAC-adres of een IP-adres? ip adress
Wanneer wordt de default gateway gebruikt? ?? waneer gegevens naar andere netwwerk wil versturen.
Wat bevindt zich op de default gateway? ?? in router die fugeert naar toegangpunt van dataverkeer. -->


<!-- IP-adressen
Hoe je de onderstaande vragen kunt beantwoorden staat uitgelegd in hoofdstuk 2.8, kopje ‘2.2 Routers’ van de reader.

Welk IP-adres heb je op het internet? ipv4
Welk IP-adres heb je in het netwerk waar je nu op zit (bijvoorbeeld je thuisnetwerk of Eduroam op de HAN)? fe80::fca9:b7e5:9744:b3bc%24
Wat is het IP-adres van www.nu.nl? 2.18.244.76 -------------(vul hiervoor je in je terminal het command ping www.nu.nl in)
Langs hoeveel routers moeten berichten gaan om bij www.nu.nl te komen? (vul hiervoor in de terminal het command tracert www.nu.nl (windows) of traceroute www.nu.nl (MAC) in)
Domain Name Server (DNS)
9 
Van welke DNS krijg je het IP-adres van www.han.nl? (Dit zoek je op door in de terminal het volgende in te vullen: nslookup www.han.nl)
Name:    www.han.nl
Addresses:  2001:610:468:4412::94
          145.74.103.94
Van welke DNS krijg je het IP-adres van www.nasa.gov?
nasa-gov.go-vip.net
Wat is je default domein name server? (Dit zoek je op door in de terminal het command nslookup te runnen.)
home
Hoe kan het dat je het IP-adres van een website van een andere DNS krijgt dan je default DNS?

in DNS server kent die de ip adres niet in cache, dan vraagt die andere dns server.
Is het ook mogelijk dat je naar een website gaat en dan je computer niet het IP-adres hoeft op te vragen aan een DNS? Zo ja, waarom? Zo nee, waarom niet?
ik weet niet
HTTP-protocol
Als jij aan het surfen bent op het web, ben jij dan een client of een server? 
client 
Wat is het voordeel van data versturen via een POST-request in plaats van een GET-request? niet zichtbaar in URL zodat er minder kans is om gehackt te worden.
Wat is het voordeel van data versturen via een GET-request in plaats van een POST-request? 
data uit url op te halen voor debug -->

