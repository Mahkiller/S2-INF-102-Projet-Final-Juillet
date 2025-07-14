<?php
require_once("../inc/connect.php");
function emailExiste($email, $conn) {
    $sql = "SELECT * FROM exam2_membre WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_num_rows($result) > 0;
}

function inscrireMembre($nom, $date, $genre, $email, $ville, $mdp, $conn) {
    $sql = "INSERT INTO exam2_membre (nom, date_de_naissance, genre, email, ville, mdp) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", $nom, $date, $genre, $email, $ville, $mdp);
    return mysqli_stmt_execute($stmt);
}

function verifierConnexion($email, $mdp, $conn) {
    $sql = "SELECT * FROM exam2_membre WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        if ( $mdp==$row['mdp']) {
            return $row;
        }
    }
    return false;
}


// requete -> table :
 function getRequestTab($request) {
    $conn=dbconnect();
    if (!$request) {
        die('Erreur SQL : ' . mysqli_error($conn));
    }
    while ($row = mysqli_fetch_assoc($request)) {
        $tab[] = $row;
    }
   // je ne sais pas comment utiliser mysqli_close($conn);
    return $tab;
}

function getemp
?>