<?php
require_once '../db_connectie.php';
$niuewGebruiker = maakVerbinding()->prepare("
    INSERT INTO [User] (username, password, first_name, last_name, role, address) 
    VALUES (:Gebruikersnaam, :wachtwoord, :voornaam, :Achternaam, :role, :adres)
");

$niuewGebruiker->execute([
    ':Gebruikersnaam' => $_POST['Gebruikersnaam'],
    ':wachtwoord' => password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT),
    ':voornaam'       => $_POST['voornaam'],
    ':Achternaam'     => $_POST['Achternaam'],
    ':role'           => $_POST['role'],
    ':adres'         => $_POST['adres']
]);

header('Location: ../hoofdpagina/hoofdpaginaHTML.php');
exit();
?>