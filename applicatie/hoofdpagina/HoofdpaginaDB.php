<?php

require_once '../db_connectie.php';

function haalAlleProductenMetCategorieen(){
    $dbo = maakVerbinding();
    $query = "SELECT p.name AS product_name, p.price, pt.name AS category_name
            FROM product p
            JOIN ProductType pt ON p.type_id = pt.name";
    $uitvoering = $dbo->query($query);
    $resultaat = $uitvoering->fetchAll();
    return $resultaat;
}

?>