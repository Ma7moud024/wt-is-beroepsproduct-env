<?php
 require_once 'db_connectie.php';

$query = $verbinding ->query('SELECT username
FROM USER s LEFT OUTER JOIN Componist n ON s.componistId = n.componistId');
$resultraten = $query -> fetchAll();
echo '<pre>' ,print_r($resultraten), '</pre>';


$menu = [
    "Eten" => ["Shoarma" => 6.95, "Doner" => 4.50],
    "Drinken" => ["Cola" => 2.95, "Ayran" => 2.00],
    "Kranten" => ["De Gelderlander" => 2.95, "Trouw" => 2.00]
];
 
$htmlMenu="";
foreach ($menu as $categorie => $submenu) {
    $htmlMenu .= "<h2>$categorie</h2>";
    $htmlMenu .= "<table>";

    foreach ($submenu as $item => $price) {
        $htmlMenu .= "<tr><td>" . $item . "</td><td>&euro; " . $price . "</td></tr>";
    }
 
    
 
    $htmlMenu .= "</table>";
}
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
 
    <?= $htmlMenu ?>
 
    <h2>Eten</h2>
    <table>
        <tr><td>Shoarma</td><td>&euro; 6.95</td></tr>
        <tr><td>Appels</td><td>&euro; 10.95</td></tr>
        <tr><td>Tabouleh</td><td>&euro; 8.95</td></tr>
        <tr><td>Hamburger</td><td>&euro; 5.50</td></tr>
    </table>
 
    <h2>Drinken</h2>
    <table>
        <tr><td>Cola</td><td>&euro; 2.00</td></tr>
        <tr><td>Ayran</td><td>&euro; 2.30</td></tr>
        <tr><td>Fernandes</td><td>&euro; 2.50</td></tr>
        <tr><td>Bier</td><td>&euro; 5.50</td></tr>
    </table>
  </body>
</html>