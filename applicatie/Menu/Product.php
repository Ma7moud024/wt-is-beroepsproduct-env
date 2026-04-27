<?php
require_once('../db_connectie.php'); 

$verbinding = maakVerbinding();

$stmt = $verbinding->prepare("SELECT name, price FROM Product");
$stmt->execute();
$producten = $stmt->fetchAll(PDO::FETCH_ASSOC);

$afbeeldingen = [
    'Hawaiian Pizza'      => 'Hawaii.jpg',
    'Margherita Pizza'    => 'margherita.jpg',
    'Pepperoni Pizza'     => 'Salami.jpg',
    'Vegetarische Pizza'  => 'champignons.jpg',
    'Coca Cola'           => 'download.png',
    'Sprite'              => 'download.png',
    'Knoflookbrood'       => 'download.png',
    'Combinatiemaaltijd'  => 'download.png',
];

$stmtIng = $verbinding->prepare("
    SELECT Product.name, product_Ingredient.ingredient_name 
    FROM Product 
    INNER JOIN product_Ingredient ON Product.name = product_Ingredient.product_name
");
$stmtIng->execute();
$alleIngrediënten = $stmtIng->fetchAll(PDO::FETCH_ASSOC);

// Groepeer ingrediënten per product
$ingrediëntenPerProduct = [];
foreach ($alleIngrediënten as $rij) {
    $ingrediëntenPerProduct[$rij['name']][] = $rij['ingredient_name'];
}

function product($producten, $afbeeldingen, $ingrediëntenPerProduct) {
    foreach ($producten as $product): 
        $foto = $afbeeldingen[$product['name']] ?? 'download.png';
        $ingrediënten = $ingrediëntenPerProduct[$product['name']] ?? [];
    ?>
        <div class="product">
            <img src="/afbeeldingen/<?php echo $foto; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
            <h3><?php echo ($product['name']); ?></h3>
            <ul>
                <?php foreach ($ingrediënten as $ingrediënt): ?>
                    <li><?php echo ($ingrediënt); ?></li>
                <?php endforeach; ?>
            </ul>
            <p>Prijs: €<?php echo $product['price']; ?></p>
            <button>Bestel</button>
        </div>
    <?php endforeach;
}
?>