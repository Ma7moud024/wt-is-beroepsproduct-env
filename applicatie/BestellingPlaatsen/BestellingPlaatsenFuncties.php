<?php

function gebruikerGegevensOphalen($client_username)
{
    $GebruikerGegevensOphalen = maakVerbinding()->prepare("SELECT first_name, last_name, address FROM [user] WHERE username = :username");
    $GebruikerGegevensOphalen->bindParam(":username", $client_username);
    $GebruikerGegevensOphalen->execute();
    $Gegevens = $GebruikerGegevensOphalen->fetch(PDO::FETCH_ASSOC);
    $adres = $Gegevens['address'];
    $client_name = $Gegevens['first_name'] . ' ' . $Gegevens['last_name'];

    return ['client_name' => $client_name, 'address' => $adres];
}

function personeelOphalen()
{
    $PersoneelOphalen = maakVerbinding()->prepare(
        "SELECT TOP 1 username FROM [user] WHERE role = 'Personnel' ORDER BY username"
    );
    $PersoneelOphalen->execute();

    return $PersoneelOphalen->fetchColumn();
}

function gebruikerBestellingPlaatsen($client_username, $client_name, $address, $personnel_username)
{
    $GebruikerBestellingPlaatsen = maakVerbinding()->prepare(
        "INSERT INTO Pizza_Order (client_username, client_name, personnel_username, datetime, status, address) 
         VALUES (:client_username, :client_name, :personnel_username, GETDATE(), 1, :address);
         SELECT SCOPE_IDENTITY() AS order_id"
    );

    $GebruikerBestellingPlaatsen->bindParam(":client_username", $client_username);
    $GebruikerBestellingPlaatsen->bindParam(":client_name", $client_name);
    $GebruikerBestellingPlaatsen->bindParam(":personnel_username", $personnel_username);
    $GebruikerBestellingPlaatsen->bindParam(":address", $address);

    $GebruikerBestellingPlaatsen->execute();
    $GebruikerBestellingPlaatsen->nextRowset();

    $result = $GebruikerBestellingPlaatsen->fetch(PDO::FETCH_ASSOC);

    return $result['order_id'];
}

function gebruikerProductenToevoegen($order_id, $product_name, $quantity)
{
    $GebruikerProductenToevoegen = maakVerbinding()->prepare("INSERT INTO Pizza_Order_Product (order_id, product_name, quantity) VALUES (:order_id, :product_name, :quantity)");
    $GebruikerProductenToevoegen->bindParam(":order_id", $order_id);
    $GebruikerProductenToevoegen->bindParam(":product_name", $product_name);
    $GebruikerProductenToevoegen->bindParam(":quantity", $quantity);
    $GebruikerProductenToevoegen->execute();
}
