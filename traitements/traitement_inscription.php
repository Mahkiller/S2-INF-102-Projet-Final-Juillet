<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("../inc/connect.php");
require_once("../inc/fonction.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST["nom"];
    $date = $_POST["date_de_naissance"];
    $genre = $_POST["genre"];
    $email = $_POST["email"];
    $ville = $_POST["ville"];
    $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

    $conn = dbconnect();

    if (emailExiste($email, $conn)) {
        header("Location: ../pages/inscription.php?erreur=email");
        exit;
    } else {
        if (inscrireMembre($nom, $date, $genre, $email, $ville, $mdp, $conn)) {
            header("Location: ../pages/login.php?inscription=success");
            exit;
        } else {
            header("Location: ../pages/inscription.php?erreur=sql");
            exit;
        }
    }
} else {
    header("Location: ../pages/inscription.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>