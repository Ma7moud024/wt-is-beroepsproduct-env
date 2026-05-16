<?php
require_once __DIR__ . '/../db_connectie.php';
$niuewGebruiker = maakVerbinding()->prepare("
    INSERT INTO [User] (username, password, first_name, last_name, role, address) 
    VALUES (:Gebruikersnaam, :wachtwoord, :voornaam, :Achternaam, :role, :adres)
");

$niuewGebruiker->execute([
    ':Gebruikersnaam' => $_POST['Gebruikersnaam'],
    ':wachtwoord' => password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT),
    ':voornaam'       => $_POST['voornaam'],
    ':Achternaam'     => $_POST['Achternaam'],
    ':role'           => 'Client',
    ':adres'         => $_POST['adres']
]);

header('Location: ../hoofdpagina/hoofdpagina.php');
exit();
