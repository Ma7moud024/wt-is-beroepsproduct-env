<?php
session_start();

$username = $_SESSION['username'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="BestellingPlaatsen.css">
    <title>Document</title>
</head>

<body>
    <header>
        <nav>
            <a href="../hoofdpagina/hoofdpaginaHTML.php">Home</a>
        </nav>
    </header>
    <main>
        <h1>Bestelling Plaatsen</h1>
        <li>
            <ul>
                <?php if (!empty($_SESSION['bestelling']) && is_array($_SESSION['bestelling'])): ?>
                    <?php foreach ($_SESSION['bestelling'] as $item): ?>
                        <li>
                            <strong><?php echo $item['product_name']; ?></strong> - Aantal: <?php echo $item['quantity']; ?>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Geen producten in je bestelling.</p>
                <?php endif; ?>
            </ul>
        </li>
        <div>

        </div>
        <form method="post" action="BestellingPlaatsenDB.php">
            <input type="hidden" name="username" value="<?php echo ($username); ?>">
            <label for="address">Voer uw adres in als het anders is dan uw geregistreerde adres:</label>
            <input type="text" name ="address"  >
            <button type="submit">Bestelling Plaatsen</button>
        </form>


    </main>

    <footer>
        <a href="../privacyverklaring.php">Privacy Verklaring</a>
    </footer>

</body>

</html>