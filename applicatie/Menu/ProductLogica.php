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

$Ingrediënten = maakVerbinding()->prepare("
    SELECT Product.name, product_Ingredient.ingredient_name 
    FROM Product 
    INNER JOIN product_Ingredient ON Product.name = product_Ingredient.product_name
");
$Ingrediënten->execute();
$alleIngrediënten = $Ingrediënten->fetchAll(PDO::FETCH_ASSOC);

$ingrediëntenPerProduct = [];
foreach ($alleIngrediënten as $rij) {
    $ingrediëntenPerProduct[$rij['name']][] = $rij['ingredient_name'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $quantity = max(1, intval($_POST['quantity']));

    $found = false;
    foreach ($_SESSION['bestelling'] as &$item) {
        if ($item['product_name'] === $product_name) {
            $item['quantity'] += $quantity;
            $found = true;
            break;
        }
    }
    unset($item);

    if (!$found) {
        $_SESSION['bestelling'][] = [
            'product_name' => $product_name,
            'quantity' => $quantity,
        ];
    }

    header("Location: ../Menu/Menu.php");
    exit;
}
