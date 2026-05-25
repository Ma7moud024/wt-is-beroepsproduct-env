<?php

function mijnBestellingenOphalen($gebruikersnaam)
{
    $bestelling = maakVerbinding()->prepare("
        SELECT
            Pizza_Order_Product.product_name,
            Pizza_Order_Product.quantity,
            Pizza_Order.datetime,
            Pizza_Order.status,
            Pizza_Order.address
        FROM Pizza_Order_Product
        INNER JOIN Pizza_Order ON Pizza_Order_Product.order_id = Pizza_Order.order_id
        WHERE Pizza_Order.client_username = ?
        ORDER BY Pizza_Order.datetime DESC
    ");
    $bestelling->execute([$gebruikersnaam]);
    return $bestelling->fetchAll(PDO::FETCH_ASSOC);
}
