<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h1>test</h1>

<body>
<?php
require_once '../db_connectie.php';

// 1. Ophalen van de data
// maak verbinding met de database (zie db_connection.php)
$db = maakVerbinding();

// haal alle componisten op en tel het aantal stukken
$query = 'select titel from stuk';
// voer de query uit op de database
$data = $db->query($query);

// 2. Renderen van de data
// Begin van de "table"
$componisten_table = '<table>';
// De "table heads"
$componisten_table = $componisten_table . '<tr><th>Id</th></tr>';

// Elke rij als een "table row"
foreach($data as $rij) {
  $titel = $rij['titel'];
  $componisten_table = $componisten_table . "<tr><td>$titel</td></tr>";
}

// Eind van de "table"
$componisten_table = $componisten_table . "</table>";

?>

<?php
echo $componisten_table;
?>

</body>
</html>