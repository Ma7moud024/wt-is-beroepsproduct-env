<?php

session_start();
require_once __DIR__ . '/../db_connectie.php';
require_once __DIR__ . '/BestellingPlaatsenFuncties.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../LoginEnRegistratie/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $gebruikersnaam = $_SESSION['username'];
    $bestelling = $_SESSION['bestelling'] ?? [];

    $gegevens = gebruikerGegevensOphalen($gebruikersnaam);
    $clientNaam = $gegevens['client_name'];

    if (!empty($_POST['address'])) {
        $adres = $_POST['address'];
    } else {
        $adres = $gegevens['address'];
    }

    $personeelsnaam = personeelOphalen();

    $bestellingId = gebruikerBestellingPlaatsen(
        $gebruikersnaam,
        $clientNaam,
        $adres,
        $personeelsnaam
    );

    foreach ($bestelling as $item) {
        $productNaam = $item['product_name'] ?? null;
        $aantal = $item['quantity'] ?? 0;

        if ($productNaam && $aantal > 0) {
            gebruikerProductenToevoegen($bestellingId, $productNaam, $aantal);
        }
    }

    unset($_SESSION['bestelling']);

    header('Location: ../MijnBestelling/MijnBestelling.php');
    exit();
}
