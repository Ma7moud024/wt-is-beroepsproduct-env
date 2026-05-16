<?php
session_start();

$username = $_SESSION['username'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
    $updatedQuantities = $_POST['quantity'] ?? [];

    foreach ($_SESSION['bestelling'] as $index => $item) {
        $product_name = $item['product_name'] ?? '';
        if (!isset($updatedQuantities[$product_name])) {
            continue;
        }

        $newQuantity = intval($updatedQuantities[$product_name]);
        if ($newQuantity > 0) {
            $_SESSION['bestelling'][$index]['quantity'] = $newQuantity;
        } else {
            unset($_SESSION['bestelling'][$index]);
        }
    }

    $_SESSION['bestelling'] = array_values($_SESSION['bestelling']);
    header('Location: BestellingPlaatsen.php');
    exit;
}
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
        <?php include __DIR__ . '/../header.php'; ?>
    </header>
    <main>
        <h1>Bestelling Plaatsen</h1>
        <?php if (!empty($_SESSION['bestelling']) && is_array($_SESSION['bestelling'])): ?>
            <form method="post" action="BestellingPlaatsen.php">
                <ul>
                    <?php foreach ($_SESSION['bestelling'] as $item): ?>
                        <li>
                            <strong><?php echo htmlspecialchars($item['product_name']); ?></strong>
                            - Aantal:
                            <input type="number"
                                name="quantity[<?php echo htmlspecialchars($item['product_name']); ?>]"
                                value="<?php echo intval($item['quantity']); ?>"
                                min="0"
                                style="width: 60px;">
                        </li>
                    <?php endforeach; ?>
                </ul>
                <button type="submit" name="update_cart">Winkelwagen bijwerken</button>
            </form>
        <?php else: ?>
            <p>Geen producten in je bestelling.</p>
        <?php endif; ?>
        <div>

        </div>
        <form method="post" action="BestellingPlaatsenDB.php">
            <input type="hidden" name="username" value="<?php echo ($username); ?>">
            <label for="address">Voer uw adres in als het anders is dan uw geregistreerde adres:</label>
            <input type="text" name="address">
            <button type="submit">Bestelling Plaatsen</button>
        </form>


    </main>

    <?php include __DIR__ . '/../footer.php'; ?>

</body>

</html>