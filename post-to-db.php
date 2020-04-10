<?php
function insertData() {
    require('connect-db.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = trim($_POST['username']);
        $image = $_POST['image'];
        $title = trim($_POST['title']);
        $caption = trim($_POST['caption']);

        if (isset($user) && isset($image) && isset($title) && isset($caption)) {
            $query = "INSERT INTO posts (username, image, title, caption) VALUES (:user, :image, :title, :caption)";
            $statement = $db->prepare($query);
            $statement->bindValue(':user', $user);
            $statement->bindValue(':image', $image);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':caption', $caption);
            $statement->execute();
            $statement->closeCursor();
        }
    }
}

insertData();
header("Location: dashboard.php");

?>