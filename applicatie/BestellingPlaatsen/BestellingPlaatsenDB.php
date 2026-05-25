<?php

session_start();
require_once __DIR__ . '/../db_connectie.php';
require_once __DIR__ . '/BestellingPlaatsenFuncties.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../LoginEnRegistratie/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_SESSION['username'];
    $bestelling = $_SESSION['bestelling'] ?? [];

    $gegevens = gebruikerGegevensOphalen($username);
    $client_name = $gegevens['client_name'];

    if (!empty($_POST['address'])) {
        $address = $_POST['address'];
    } else {
        $address = $gegevens['address'];
    }

    $personnel_username = personeelOphalen();

    $order_id = gebruikerBestellingPlaatsen(
        $username,
        $client_name,
        $address,
        $personnel_username
    );

    foreach ($bestelling as $item) {
        $product_name = $item['product_name'] ?? null;
        $quantity = $item['quantity'] ?? 0;

        if ($product_name && $quantity > 0) {
            gebruikerProductenToevoegen($order_id, $product_name, $quantity);
        }
    }

    unset($_SESSION['bestelling']);

    header('Location: ../MijnBestelling/MijnBestelling.php');
    exit();
}
