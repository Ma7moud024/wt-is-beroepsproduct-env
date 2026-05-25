<?php ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registratie.css">
    <title>Document</title>
</head>

<body>
    <header>
        <?php include __DIR__ . '/../header.php'; ?>
    </header>
    <main>
        <h1>Registreren</h1>
        <form action="registratie_verwerking.php" method="post">

            <label for="voornaam">Voornaam:</label>
            <input type="text" id="voornaam" name="voornaam" required><br><br>

            <label for="achternaam">Achternaam:</label>
            <input type="text" id="achternaam" name="achternaam" required><br><br>

            <label for="gebruikersnaam">Gebruikersnaam:</label>
            <input type="text" id="gebruikersnaam" name="gebruikersnaam" required><br><br>

            <label for="wachtwoord">Wachtwoord:</label>
            <input type="password" id="wachtwoord" name="wachtwoord" required><br><br>

            <label for="adres">Adres:</label>
            <input type="text" id="adres" name="adres"><br><br>

            <button type="submit">Registreren</button>
        </form>
        <p>Heb je al een account? <a href="login.php">Log hier in</a>.</p>

    </main>
    <?php include __DIR__ . '/../footer.php'; ?>

</body>

</html>