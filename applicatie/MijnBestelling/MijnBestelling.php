<?php require_once __DIR__ . '/MijnBestellingLogica.php'; ?>

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
        <?php include __DIR__ . '/../header.php'; ?>
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
    <?php include __DIR__ . '/../footer.php'; ?>

</body>

</html>