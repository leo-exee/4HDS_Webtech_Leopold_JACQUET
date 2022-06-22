<?php

require_once('./pdo.php');

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

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$token = randomToken(15);
$date = date('m-d-Y');

$sql = "INSERT INTO users (nom, prenom, token, role, created_at, update_at) VALUES ('$nom', '$prenom', '$token', 'client', '$date', '$date')";

if ($dbh->query($sql) === TRUE) {
  echo "New product created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $dbh->error;
}