<?php

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

        <form method="post" action="ProductLogica.php">
            <input type="hidden" name="product_name" value="<?php echo ($product['name']); ?>">
            <input type="number" name="quantity" value="1" min="1">
            <button type="submit">Bestel</button>
        </form>

<?php endforeach;
}
