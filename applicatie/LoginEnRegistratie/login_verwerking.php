
<?php
session_start();
require_once '../db_connectie.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['Gebruikersnaam'], $_POST['wachtwoord'])) {

        $inloggen = maakVerbinding()->prepare("
            SELECT username, password, role 
            FROM [User] 
            WHERE username = :username
        ");

        $inloggen->execute([
            ':username' => $_POST['Gebruikersnaam']
        ]);

        $user = $inloggen->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($_POST['wachtwoord'], $user['password'])) {

            
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            header("Location: ../hoofdpagina/hoofdpaginaHTML.php");
            exit;

        } else {
            
            $error = "Foute gebruikersnaam of wachtwoord";
            header("Location: login.php?error=" . urlencode($error));
            exit;
        }

    } 
}
?>