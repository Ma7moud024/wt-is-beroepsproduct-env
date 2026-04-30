
<?php

session_start();

require_once('../db_connectie.php');

if (!isset($_SESSION['bestelling'])) {
    $_SESSION['bestelling'] = [];
}


$menu = maakVerbinding()->prepare("SELECT name, price FROM Product");
$menu->execute();
$producten = $menu->fetchAll(PDO::FETCH_ASSOC);

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

$Ingrediënten = maakVerbinding()->prepare("
    SELECT Product.name, product_Ingredient.ingredient_name 
    FROM Product 
    INNER JOIN product_Ingredient ON Product.name = product_Ingredient.product_name
");
$Ingrediënten->execute();
$alleIngrediënten = $Ingrediënten->fetchAll(PDO::FETCH_ASSOC);

// Groepeer ingrediënten per product
$ingrediëntenPerProduct = [];
foreach ($alleIngrediënten as $rij) {
    $ingrediëntenPerProduct[$rij['name']][] = $rij['ingredient_name'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $_SESSION['bestelling'][] = ['product_name' => $product_name, 'quantity' => $quantity];

    header("Location: ../Menu/Menu.php");
    exit;
}

function product($producten, $afbeeldingen, $ingrediëntenPerProduct)
{
    foreach ($producten as $product):
        $foto = $afbeeldingen[$product['name']] ?? 'download.png';
        $ingrediënten = $ingrediëntenPerProduct[$product['name']] ?? [];
?>
        <div class="product">
            <img src="/afbeeldingen/<?php echo ($foto); ?>" alt="<?php echo ($product['name']); ?>">
            <h3><?php echo ($product['name']); ?></h3>
            <ul>
                <?php foreach ($ingrediënten as $ingrediënt): ?>
                    <li><?php echo ($ingrediënt); ?></li>
                <?php endforeach; ?>
            </ul>
            <p>Prijs: €<?php echo ($product['price']); ?></p>
        </div>

        <form method="post" action="../Menu/Product.php">
            <input type="hidden" name="product_name" value="<?php echo ($product['name']); ?>">
            <input type="number" name="quantity" value="1" min="1">
            <button type="submit">Bestel</button>
        </form>

<?php endforeach;
}

?>
