<?php
session_start();
require_once __DIR__ . '/../db_connectie.php';

$vereist = ['gebruikersnaam', 'wachtwoord', 'voornaam', 'achternaam', 'adres'];
foreach ($vereist as $veld) {
    if (empty($_POST[$veld])) {
        header("Location: registratie.php?error=" . urlencode("Vul alle velden in"));
        exit;
    }
}

$db = maakVerbinding();

$bestaatAl = $db->prepare("SELECT 1 FROM [User] WHERE username = :username");
$bestaatAl->execute([':username' => $_POST['gebruikersnaam']]);
if ($bestaatAl->fetchColumn()) {
    header("Location: registratie.php?error=" . urlencode("Gebruikersnaam is al in gebruik"));
    exit;
}

$nieuweGebruiker = $db->prepare("
    INSERT INTO [User] (username, password, first_name, last_name, role, address)
    VALUES (:gebruikersnaam, :wachtwoord, :voornaam, :achternaam, :role, :adres)
");

$nieuweGebruiker->execute([
    ':gebruikersnaam' => $_POST['gebruikersnaam'],
    ':wachtwoord'     => password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT),
    ':voornaam'       => $_POST['voornaam'],
    ':achternaam'     => $_POST['achternaam'],
    ':role'           => 'Client',
    ':adres'          => $_POST['adres']
]);

header('Location: login.php');
exit();
