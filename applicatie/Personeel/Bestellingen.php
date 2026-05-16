<?php require_once __DIR__ . '/BestellingLogica.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Bestelling.css" />
    <title>Document</title>
</head>

<body>
    <header>
        <?php include __DIR__ . '/../header.php'; ?>
    </header>
    <main>
        <h1>Bestellingen</h1>
        <ul>
            <?php foreach ($bestellingen as $bestelling): ?>
                <li>
                    <strong><?php echo $bestelling['product_name']; ?></strong> -
                <li>
                    <strong>
                        Quantity: <?php echo $bestelling['quantity']; ?> -
                        Client: <?php echo $bestelling['client_username']; ?> -
                        Date: <?php echo $bestelling['datetime']; ?> -
                        Status: <?php
                                if ($bestelling['status'] == 1) {
                                    echo "In behandeling";
                                } elseif ($bestelling['status'] == 2) {
                                    echo "Onderweg";
                                } elseif ($bestelling['status'] == 3) {
                                    echo "Afgeleverd";
                                }; ?> -
                        Address: <?php echo $bestelling['address']; ?>
                    </strong>
                </li>
                <p>Pas hier de status van bestelling!</p>
                <form action="" method="post" style="display:inline;">
                    <input type="hidden" name="order_id" value="<?php echo ($bestelling['order_id']); ?>">
                    <input type="hidden" name="status" value="1">
                    <button type="submit">In behandeling</button>
                </form>
                <form action="" method="post" style="display:inline;">
                    <input type="hidden" name="order_id" value="<?php echo ($bestelling['order_id']); ?>">
                    <input type="hidden" name="status" value="2">
                    <button type="submit">Onderweg</button>
                </form>
                <form action="" method="post" style="display:inline;">
                    <input type="hidden" name="order_id" value="<?php echo ($bestelling['order_id']); ?>">
                    <input type="hidden" name="status" value="3">
                    <button type="submit">Afgeleverd</button>
                </form>
            <?php endforeach; ?>
        </ul>
    </main>
    <?php include __DIR__ . '/../footer.php'; ?>
</body>

</html>