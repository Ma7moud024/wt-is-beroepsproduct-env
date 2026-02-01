<?php
session_start();
require_once 'Hoofdpagina.php';
require_once 'HoofdpaginaDB.php';


$menu = haalAlleProductenMetCategorieen();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="hoofdpagina.css" />
</head>

<body>

    <div class="Pagina">

        <header>

            <h1>Hi welkom (username)</h1>


        </header>

        <main>
            <div class="knoppen">
                <form action="../loginpagina/Loginpagina.html" method="get">
                    <button type="submit">Login</button>
                </form>
                <form action="../uitlogen.html" method="get">
                    <button type="submit">Uitlogen</button>
                </form>
                <form action="../Bestellingenstatus.html" method="get">
                    <button type="submit">Bestellingen status</button>
                </form>
            </div>

            <div class='menu'>

                <form action="../toevoegenAanWink.html" method="get">
                    <button type="submit">Producten pagina</button>
                </form>
            </div>

            <?php
            print_r($menu);
            ?>

            
        </main>

        <footer>

            <h2>Footer</h2>


        </footer>
    </div>
</body>

</html>