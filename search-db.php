<?php
  // Ryan Riley
  require('connect-db.php');

  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $keyword = trim($_GET['keyword']);
    try {
        // $db = new PDO("mysql:host=localhost;dbname=petbook", "root", "");
        
        $query = "CREATE TABLE search_results SELECT uniqueID, username, image, title, caption, timestamp, likes FROM posts
        WHERE uniqueID LIKE '%$keyword%' OR username LIKE '%$keyword%' OR image LIKE '%$keyword%' OR title LIKE '%$keyword%'
        OR caption LIKE '%$keyword%' OR timestamp LIKE '%$keyword%' OR likes LIKE '%$keyword%'";
        $statement = $db->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll();
        $statement->closecursor();
        header("Location: search-results.php");
    }
    catch (PDOException $e) {
        echo $e -> getMessage();
    }
  }

?>