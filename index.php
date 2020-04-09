<?php

function selectData(){
  require(connect-db.php);
  $query = "SELECT * FROM info";
  $statement = $db -> prepare($query);
  $statement -> execute();
  $results = $statement -> fetchAll();
  $statement -> closeCursor();

  foreach($results as $result) {
    echo "ID: " . $result['id'] . " email: " . $result['email'] . " password: " . $result['password'] . "<br/>";
  }
}

selectData();

 ?>
