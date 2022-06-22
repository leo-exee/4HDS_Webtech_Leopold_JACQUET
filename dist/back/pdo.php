<?php

function pdo() {
    $servername = "localhost";
    $username = "root";
    $password = "lego2002";
    $dbname = "gestion_stock";
    $dbh = new mysqli($servername, $username, $password, $dbname);
    if ($dbh->connect_error) {
        die("Connection failed: " . $dbh->connect_error);
    }
    return $dbh;
}