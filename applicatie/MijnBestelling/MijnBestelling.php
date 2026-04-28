<?php
session_start();
require_once('../MijnBestelling/MijnBestellingDB.php');


if (isset($_SESSION['username'])) {
    $client_username = $_SESSION['username'];
    $bestellingen = MijnBestellingenOphalen($client_username);
} else {
    header("Location: ../LoginEnRegistratie/login.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="MijnBestelling.css">
    <title>Document</title>
</head>

<body>
    <header>
        <nav>
            <a href="../hoofdpagina/hoofdpaginaHTML.php">Home</a>
        </nav>
    </header>
    <main>
        <h1>Mijn Bestelling</h1>
        <p>Hier kunt u uw bestelling bekijken</p>
        <table>
            <tr>
                <th>Productnaam</th>
                <th>Aantal</th>
                <th>Datum en Tijd</th>
                <th>Status</th>
                <th>Adres</th>
            </tr>
            <?php foreach ($bestellingen as $bestelling) : ?>
                <tr>
                    <td><?php echo ($bestelling['product_name']); ?></td>
                    <td><?php echo ($bestelling['quantity']); ?></td>
                    <td><?php echo ($bestelling['datetime']); ?></td>
                    <td><?php echo ($bestelling['status']); ?></td>
                    <td><?php echo ($bestelling['address']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>
    <footer>
        <a href="../privacyverklaring.php">Privacy Verklaring</a>
    </footer>

</body>

</html>