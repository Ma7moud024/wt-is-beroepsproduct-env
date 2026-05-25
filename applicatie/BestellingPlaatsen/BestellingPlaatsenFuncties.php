<?php

function gebruikerGegevensOphalen($gebruikersnaam)
{
    $gebruikerGegevensOphalen = maakVerbinding()->prepare("SELECT first_name, last_name, address FROM [user] WHERE username = :username");
    $gebruikerGegevensOphalen->bindParam(":username", $gebruikersnaam);
    $gebruikerGegevensOphalen->execute();
    $gegevens = $gebruikerGegevensOphalen->fetch(PDO::FETCH_ASSOC);
    $adres = $gegevens['address'];
    $clientNaam = $gegevens['first_name'] . ' ' . $gegevens['last_name'];

    return ['client_name' => $clientNaam, 'address' => $adres];
}

function personeelOphalen()
{
    $personeelOphalen = maakVerbinding()->prepare(
        "SELECT TOP 1 username FROM [user] WHERE role = 'Personnel' ORDER BY username"
    );
    $personeelOphalen->execute();

    return $personeelOphalen->fetchColumn();
}

function gebruikerBestellingPlaatsen($gebruikersnaam, $clientNaam, $adres, $personeelsnaam)
{
    $gebruikerBestellingPlaatsen = maakVerbinding()->prepare(
        "INSERT INTO Pizza_Order (client_username, client_name, personnel_username, datetime, status, address)
         VALUES (:client_username, :client_name, :personnel_username, GETDATE(), 1, :address);
         SELECT SCOPE_IDENTITY() AS order_id"
    );

    $gebruikerBestellingPlaatsen->bindParam(":client_username", $gebruikersnaam);
    $gebruikerBestellingPlaatsen->bindParam(":client_name", $clientNaam);
    $gebruikerBestellingPlaatsen->bindParam(":personnel_username", $personeelsnaam);
    $gebruikerBestellingPlaatsen->bindParam(":address", $adres);

    $gebruikerBestellingPlaatsen->execute();
    $gebruikerBestellingPlaatsen->nextRowset();

    $resultaat = $gebruikerBestellingPlaatsen->fetch(PDO::FETCH_ASSOC);

    return $resultaat['order_id'];
}

function gebruikerProductenToevoegen($bestellingId, $productNaam, $aantal)
{
    $gebruikerProductenToevoegen = maakVerbinding()->prepare("INSERT INTO Pizza_Order_Product (order_id, product_name, quantity) VALUES (:order_id, :product_name, :quantity)");
    $gebruikerProductenToevoegen->bindParam(":order_id", $bestellingId);
    $gebruikerProductenToevoegen->bindParam(":product_name", $productNaam);
    $gebruikerProductenToevoegen->bindParam(":quantity", $aantal);
    $gebruikerProductenToevoegen->execute();
}
