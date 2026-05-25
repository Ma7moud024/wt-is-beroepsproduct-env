<?php
session_start();
require_once __DIR__ . '/../db_connectie.php';
require_once __DIR__ . '/BestellingenDB.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'Personnel') {
    header("Location: ../LoginEnRegistratie/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bestellingId = filter_input(INPUT_POST, 'order_id', FILTER_VALIDATE_INT);
    $status       = filter_input(INPUT_POST, 'status',   FILTER_VALIDATE_INT);
    if ($bestellingId && $status !== false) {
        statusUpdaten($bestellingId, $status);
    }
}

$bestellingen = bestellingenOphalen();
