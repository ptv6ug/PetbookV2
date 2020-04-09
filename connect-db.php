<?php

try {
  $db = new PDO("mysql:host=localhost;dbname=petbook", "root", "");

  $query = "SELECT email, password FROM test";
  $statement = $db -> prepare($query);
  $statement -> execute();
  while ($data = $statement -> fetch()) {
    echo $data['email'] . ": " . $data['password'] . "<br>";
  }


  /*
  $statement -> execute();
  $results = $statement -> fetchAll();
  $statement -> closeCursor();

  //echo $results;
  foreach($results as $result) {
    echo "ID: " . $result['id'] . " email: " . $result['email'] . " password: " . $result['password'] . "<br/>";
  }
  */

}
catch (PDOException $e) {
  echo $e -> getMessage();
}

 ?>
