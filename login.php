<?php

// include("connect-db.php");

function login() {

  $email = $_POST['email'];
  $pwd = htmlspecialchars($_POST['password']);
  $pwd_test = password_hash($pwd, PASSWORD_BCRYPT);

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($email) && isset($pwd)) {
      if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
        echo "Please enter a valid email address" . "<br/>";
      }
      else {
        if (password_verify($pwd, $pwd_test)) {
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
