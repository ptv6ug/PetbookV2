<?php
$hostname = 'localhost';
$dbname = 'petbook';
$username = "petbook";
$password = "pwdpetbook";

$dsn = "mysql:host=$hostname;dbname=$dbname";

try {
  $db = new PDO("mysql:host=localhost;dbname=petbook", "root", "");
   // echo "You are connected to the database $dbname" . "<br/>";
}
catch (PDOException $e) {
   $error = $e->getMessage();
   echo "An error occurred while connecting to the database: $error" . "<br/>";
}
catch (Exception $e) {
   $error = $e->getMessage();
   echo "Error message: $error" . "<br/>";
}

?>
