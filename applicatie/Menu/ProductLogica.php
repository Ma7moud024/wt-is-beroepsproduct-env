<?php

session_start();
require_once __DIR__ . '/../db_connectie.php';

if (!isset($_SESSION['bestelling'])) {
    $_SESSION['bestelling'] = [];
}

$menu = maakVerbinding()->prepare("SELECT name, price FROM Product");
$menu->execute();
$producten = $menu->fetchAll(PDO::FETCH_ASSOC);

$afbeeldingen = [
    'Hawaiian Pizza'      => 'Hawaii.jpg',
    'Margherita Pizza'    => 'margherita.jpg',
    'Pepperoni Pizza'     => 'Salami.jpg',
    'Vegetarische Pizza'  => 'champignons.jpg',
    'Coca Cola'           => 'download.png',
    'Sprite'              => 'download.png',
    'Knoflookbrood'       => 'download.png',
    'Combinatiemaaltijd'  => 'download.png',
];

$ingredientenQuery = maakVerbinding()->prepare("
    SELECT Product.name, product_Ingredient.ingredient_name
    FROM Product
    INNER JOIN product_Ingredient ON Product.name = product_Ingredient.product_name
");
$ingredientenQuery->execute();
$alleIngredienten = $ingredientenQuery->fetchAll(PDO::FETCH_ASSOC);

$ingredientenPerProduct = [];
foreach ($alleIngredienten as $rij) {
    $ingredientenPerProduct[$rij['name']][] = $rij['ingredient_name'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productNaam = $_POST['product_name'];
    $aantal = max(1, intval($_POST['quantity']));

    $gevonden = false;
    foreach ($_SESSION['bestelling'] as &$item) {
        if ($item['product_name'] === $productNaam) {
            $item['quantity'] += $aantal;
            $gevonden = true;
            break;
        }
    }
    unset($item);

    if (!$gevonden) {
        $_SESSION['bestelling'][] = [
            'product_name' => $productNaam,
            'quantity'     => $aantal,
        ];
    }

    header("Location: ../Menu/Menu.php");
    exit;
}
