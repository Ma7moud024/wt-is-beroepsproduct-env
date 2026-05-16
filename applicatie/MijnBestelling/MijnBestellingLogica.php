<?php
require_once __DIR__ . '/../db_connectie.php';
session_start();
require_once __DIR__ . '/MijnBestellingDB.php';

if (isset($_SESSION['username'])) {
    $client_username = $_SESSION['username'];
    $bestellingen = mijnBestellingenOphalen($client_username);
} else {
    header("Location: ../LoginEnRegistratie/login.php");
    exit();
}
