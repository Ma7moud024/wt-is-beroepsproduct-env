<?php
session_start();
require_once __DIR__ . '/../db_connectie.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['gebruikersnaam'], $_POST['wachtwoord'])) {

        $inloggen = maakVerbinding()->prepare("
            SELECT username, password, role 
            FROM [User] 
            WHERE username = :username
        ");

        $inloggen->execute([
            ':username' => $_POST['gebruikersnaam']
        ]);

        $user = $inloggen->fetch(PDO::FETCH_ASSOC);

        if ($user) {

            $wachtwoordInput = $_POST['wachtwoord'];
            $isGeldig = false;

            if (password_verify($wachtwoordInput, $user['password'])) {
                $isGeldig = true;
            } elseif ($wachtwoordInput === $user['password']) {
                $isGeldig = true;
            }

            if ($isGeldig) {
                session_regenerate_id(true);
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                header("Location: ../hoofdpagina/hoofdpagina.php");
                exit;
            } else {
                $error = "Foute gebruikersnaam of wachtwoord";
                header("Location: login.php?error=" . urlencode($error));
                exit;
            }
        } else {
            $error = "Foute gebruikersnaam of wachtwoord";
            header("Location: login.php?error=" . urlencode($error));
            exit;
        }
    } else {
        $error = "Vul alle velden in";
        header("Location: login.php?error=" . urlencode($error));
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}
