<?php
require_once __DIR__ . '/../db_connectie.php';
session_start();
require_once __DIR__ . '/MijnBestellingDB.php';

if (isset($_SESSION['username'])) {
    $gebruikersnaam = $_SESSION['username'];
    $bestellingen = mijnBestellingenOphalen($gebruikersnaam);
} else {
    header("Location: ../LoginEnRegistratie/login.php");
    exit();
}
