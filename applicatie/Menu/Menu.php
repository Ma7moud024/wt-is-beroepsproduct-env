<?php

require_once __DIR__ . '/Product.php';
require_once __DIR__ . '/ProductLogica.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Menu.css" />
    <title>Menu</title>
</head>

<body>
    <header>
        <?php include __DIR__ . '/../header.php'; ?>
    </header>
    <main>
        <h1>Menu</h1>
        <div class="producten-grid">
            <?php product($producten, $afbeeldingen, $ingrediëntenPerProduct); ?>
        </div>

    </main>
    <?php include __DIR__ . '/../footer.php'; ?>

</body>

</html>