<?php
require_once '../db_connectie.php';

function BestellingenOphalen() {
    $bestelling = maakVerbinding()->prepare("
        SELECT 
            Pizza_Order_Product.product_name, 
            Pizza_Order_Product.quantity, 
            Pizza_Order.order_id,
            Pizza_Order.client_username, 
            Pizza_Order.datetime, 
            Pizza_Order.status, 
            Pizza_Order.address
        FROM Pizza_Order_Product
        INNER JOIN Pizza_Order ON Pizza_Order_Product.order_id = Pizza_Order.order_id
        ORDER BY Pizza_Order.client_username
    ");
    $bestelling->execute();
    return $bestelling->fetchAll(PDO::FETCH_ASSOC);
}

function StatusUpdaten($order_id, $status) {
    $statusUpdaten = maakVerbinding()->prepare("
        UPDATE Pizza_Order SET status = ? WHERE order_id = ?
    ");
    $statusUpdaten->execute([$status, $order_id]);
}

?>