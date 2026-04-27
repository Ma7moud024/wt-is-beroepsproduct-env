<?php

require_once('../Menu/Product.php'); 
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
        <nav>
            <a href="../hoofdpagina/hoofdpaginaHTML.php">Home</a>
        </nav>
    </header>
    <main>
        <h1>Menu</h1>
        <div class="producten-grid">
        <?php product($producten, $afbeeldingen, $ingrediëntenPerProduct); ?>
    </div>

    </main>
    <footer>
        <a href="../privacyverklaring.php">Privacy Verklaring</a>
    </footer>

</body>

</html>