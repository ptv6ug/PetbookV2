<?php

function login() {

  $email = $_POST['email'];
  $pwd = htmlspecialchars($_POST['password']);
  $hash = "";

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($email) && isset($pwd)) {
      if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
        echo "Please enter a valid email address" . "<br/>";
      }
      else {
        try {
          $db = new PDO("mysql:host=localhost;dbname=petbook", "root", "");

          $query = "SELECT email, password FROM test";
          $statement = $db -> prepare($query);
          $statement -> execute();
          while ($data = $statement -> fetch()) {
            if ($data['email'] == $email && $data['password'] == $pwd) {
              $hash = password_hash($pwd, PASSWORD_BCRYPT);
            }
          }
        }
        catch (PDOException $e) {
          echo $e -> getMessage();
        }
        if (password_verify($pwd, $hash)) {
          header("Location: http://localhost/PetBookV2/dashboard.html");
        }
        else {
          echo "Incorrect password.";
        }
      }
    }
  }
}

login();

?>
