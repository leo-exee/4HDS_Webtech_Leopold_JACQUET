<?php

require_once('../pdo.php');

$dbh = pdo();

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$id = $_POST["id"];
$date = date('m-d-Y');

$sql = "UPDATE users SET nom='$nom', prenom='$prenom', update_at='$date' WHERE id=$id";

if ($dbh->query($sql) === TRUE) {
  echo "New user created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $dbh->error;
}