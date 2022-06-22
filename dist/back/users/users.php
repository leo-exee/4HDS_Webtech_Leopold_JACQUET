<?php
//header('Content-Type: application/json');

require_once('./pdo.php');

function usersList() {
  $dbh = pdo();
  $sql = "SELECT * FROM users";
  $result = $dbh->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $arr = array('id' => $row['id'], 'nom' => $row['nom'], 'prenom' => $row['prenom']);
      $json = json_encode($arr);
      return($json);
    }
  }

  $dbh->close();
}