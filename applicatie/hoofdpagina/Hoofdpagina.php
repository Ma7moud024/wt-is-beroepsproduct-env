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
        <?php include __DIR__ . '/../header.php'; ?>
    </header>

    <main>
        <h1>Welkom op Mahmoud pizzaria!</h1>
        <p>Hier kunt u mijn heerlijke pizza's bestellen en genieten van een geweldige eetervaring!</p>
        <img src="../afbeeldingen/hoofdpagina-header-foto.jpg" alt="Pizza" width="500">
    </main>

    <?php include __DIR__ . '/../footer.php'; ?>
</body>

</html>