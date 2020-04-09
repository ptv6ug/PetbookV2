<?php
$hostname = 'localhost:3306';
$dbname = 'petbook';
$username = "petbook";
$password = "pwdpetbook";

$dsn = "mysql:host=$hostname;dbname=$dbname";

try {
   $db = new PDO($dsn, $username, $password);
   echo "You are connected to the database $dbname";
}
catch (PDOException $e) {
   $error = $e->getMessage();
   echo "An error occurred while connecting to the database: $error";
}
catch (Exception $e) {
   $error = $e->getMessage();
   echo "Error message: $error";
}

?>
