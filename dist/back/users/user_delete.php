<?php

require_once('../pdo.php');


$dbh = pdo();

$id = $_POST['id'];

$sql = "DELETE FROM users WHERE id=$id";

if ($dbh->query($sql) === TRUE) {
  echo "User removed";
  header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
  echo "Error: " . $sql . "<br>" . $dbh->error;
}