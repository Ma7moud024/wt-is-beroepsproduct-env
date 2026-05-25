<?php
header("Content-Security-Policy: default-src 'self';");
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoofdpagina</title>
</head>

<body>
    <header>
        <nav>
            <a href="../Menu/Menu.php">Menu</a>
            <?php if (!isset($_SESSION['username'])): ?>
                <a href="../LoginEnRegistratie/login.php">Inloggen</a>
            <?php else: ?>
                <form action="../LoginEnRegistratie/loguit.php" method="post" style="display:inline;">
                    <button type="submit">Uitloggen</button>
                </form>
            <?php endif; ?>

            <a href="../BestellingPlaatsen/BestellingPlaatsen.php">Winkelwagen</a>
            <a href="../MijnBestelling/MijnBestelling.php">Mijn bestelling</a>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'Personnel'): ?>
                <a href="../Personeel/Bestellingen.php">Personeel Bestellingen Overzicht </a>
            <?php endif; ?>
        </nav>
    </header>