<?php
session_start();
require_once __DIR__ . '/../db_connectie.php';

$vereist = ['Gebruikersnaam', 'wachtwoord', 'voornaam', 'Achternaam', 'adres'];
foreach ($vereist as $veld) {
    if (empty($_POST[$veld])) {
        header("Location: registratie.php?error=" . urlencode("Vul alle velden in"));
        exit;
    }
}

$db = maakVerbinding();

$bestaatAl = $db->prepare("SELECT 1 FROM [User] WHERE username = :username");
$bestaatAl->execute([':username' => $_POST['Gebruikersnaam']]);
if ($bestaatAl->fetchColumn()) {
    header("Location: registratie.php?error=" . urlencode("Gebruikersnaam is al in gebruik"));
    exit;
}

$niuewGebruiker = $db->prepare("
    INSERT INTO [User] (username, password, first_name, last_name, role, address)
    VALUES (:Gebruikersnaam, :wachtwoord, :voornaam, :Achternaam, :role, :adres)
");

$niuewGebruiker->execute([
    ':Gebruikersnaam' => $_POST['Gebruikersnaam'],
    ':wachtwoord'     => password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT),
    ':voornaam'       => $_POST['voornaam'],
    ':Achternaam'     => $_POST['Achternaam'],
    ':role'           => 'Client',
    ':adres'          => $_POST['adres']
]);

header('Location: login.php');
exit();
