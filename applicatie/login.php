<?php
session_start();

$logged_in = false;
$error = '';


if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST['username'] ?? '';
    $password = $_POST['pass'] ?? '';

    if ($username === 'bbb' && $password === '123'){
       $_SESSION['username'] =  $username;
       $logged_in = true;

    }else {
        $error= 'fout';
    }
}

if (isset($_SESSION['username'])) {
    $html = "<h1>Welcome {$_SESSION['username']}</h1>";
    $logged_in = true;
}

?>



<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testsessie</title>
</head>

<body>
    <?php
    if ($logged_in) {
        echo $html;
    } else {
        echo $error;
    }
    ?>
    <!-- TODO: ongeldige waarde voor `action`. -->
    <form action="" method="post">
        <input type="text" name="username">
        <input type="password" name="pass">
        <input type="submit" value="login">
    </form>
    <a href="loguit.php">Log uit</a>
</body>

</html>