

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Inlogpagina</title>
</head>

<body>
    <header>
        <nav>
            <a href="../hoofdpagina/hoofdpaginaHTML.php">Home</a>
        </nav>
    </header>
    <main>
        <h1>Inloggen</h1>
        <?php if (isset($_GET['error'])): ?>
            <p style="color: red;"><?php echo ($_GET['error']); ?></p>
        <?php endif; ?>
        <form action="login_verwerking.php" method="post">
            <label for="Gebruikersnaam">Gebruikersnaam:</label>
            <input type="text" id="Gebruikersnaam" name="Gebruikersnaam" required><br><br>

            <label for="wachtwoord">Wachtwoord:</label>
            <input type="password" id="wachtwoord" name="wachtwoord" required><br><br>

            <button type="submit">Inloggen</button>
        </form>
        <p>Heb je nog geen account? <a href="../LoginEnRegistratie/registratie.php">Registreer hier</a>.</p>
    </main>
    <footer>
        <a href="../privacyverklaring.php">Privacy Verklaring</a>
    </footer>

</body>

</html>