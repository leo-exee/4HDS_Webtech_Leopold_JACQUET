<?php

require_once('../pdo.php');

function randomToken($car) {
    $string = "";
    $chaine = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
    srand ( ( double ) microtime () * 1000000 );
    for($i = 0; $i < $car; $i ++) {
        $string .= $chaine [rand () % strlen ( $chaine )];
    }
    return $string;
}

$dbh = pdo();

$nom = $_POST['nom'];
$prix = $_POST['prix'];
$description = $_POST['description'];
$token = randomToken(15);
$date = date('m-d-Y');
$stock = $_POST['stock'];
$reference = $_POST['reference'];

$sql = "INSERT INTO users (nom, descript, token, prix, stock, reference, created_at, update_at) VALUES ('$nom', '$description', '$token', '$prix', '$stock', '$reference', '$date', '$date')";

if ($dbh->query($sql) === TRUE) {
  echo "New product created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $dbh->error;
}