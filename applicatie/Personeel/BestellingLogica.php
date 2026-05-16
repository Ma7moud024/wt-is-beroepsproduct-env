<?php
require_once __DIR__ . '/../db_connectie.php';
session_start();
require_once __DIR__ . '/BestellingenDB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    statusUpdaten($_POST['order_id'], $_POST['status']);
}

$bestellingen = bestellingenOphalen();
