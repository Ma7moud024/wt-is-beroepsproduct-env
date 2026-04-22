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
        <nav>
            <a href="../hoofdpagina/hoofdpaginaHTML.php">Home</a>
        </nav>
    </header>
    <main>
        <h1>Registreren</h1>
        <form action="registratie_verwerking.php" method="post">
            <label for="voornaam">Voornaam:</label>
            <input type="text" id="voornaam" name="voornaam" required><br><br>

            <label for="Achternaam">Achternaam:</label>
            <input type="text" id="Achternaam" name="Achternaam" required><br><br>

            <label for="Gebruikersnaam">Gebruikersnaam:</label>
            <input type="text" id="Gebruikersnaam" name="Gebruikersnaam" required><br><br>

            <label for="wachtwoord">Wachtwoord:</label>
            <input type="password" id="wachtwoord" name="wachtwoord" required><br><br>

            <label for="adres">Adres:</label>
            <input type="text" id="adres" name="adres" required><br><br>

            <label for="role">Rol:</label>
            <select id="role" name="role" required>
                <option value="">Selecteer een rol</option>
                <option value="klant">Klant</option>
                <option value="personeel">Personeel</option>
            </select><br><br>

            <button type="submit">Registreren</button>
        </form>
        <p>Heb je al een account? <a href="login.php">Log hier in</a>.</p>

    </main>
    <footer>
        <a href="../privacyverklaring.php">Privacy Verklaring</a>
    </footer>

</body>

</html>