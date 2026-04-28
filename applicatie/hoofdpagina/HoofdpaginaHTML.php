<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoofdpagina</title>
    <link rel="stylesheet" href="hoofdpagina.css">
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

    <a href="winkelmandje.php">Winkelwagen</a>
    <a href="../MijnBestelling/MijnBestelling.php">Mijn bestelling</a>
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'Personnel'): ?>
    <a href="../Personeel/Bestellingen.php">Personeel Bestellingen Overzicht </a>
    <?php endif; ?>
</nav>
</header>

<main>
    <h1>Welkom op Mahmoud pizzaria!</h1>
    <p>Hier kunt u mijn heerlijke pizza's bestellen en genieten van een geweldige eetervaring!</p>
    <img src="../afbeeldingen/hoofdpagina-header-foto.jpg" alt="Pizza" width="500">
</main>

<footer>
    <a href="../privacyverklaring.php">Privacy Verklaring</a>
</footer>
</body>

</html>