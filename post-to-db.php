<?php
    require('connect-db.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $unique_id = uniqid();
        $user = trim($_POST['username']);
        // code to upload image is from: 
        // https://www.w3schools.com/php/php_file_upload.asp
        $dir = "C:/xampp/htdocs/PetbookV2/uploaded_images/"; // full path of target directory
        $image_to_save = $dir . basename($_FILES["image"]["tmp_name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image_to_save);
        $image = basename($_FILES["image"]["tmp_name"]);
        $title = trim($_POST['title']);
        $caption = trim($_POST['caption']);
        // code to get current date and time is from:
        // https://stackoverflow.com/questions/4456395/php-get-us-eastern-current-time
        date_default_timezone_set('America/New_York');
        $datetime = date('Y-m-d H:i:s', time());
        $likes = 0;

        if (isset($unique_id) && isset($user) && isset($image) && isset($title) && isset($caption) && isset($datetime) && isset($likes)) {
            $query = "INSERT INTO posts (uniqueID, username, image, title, caption, timestamp, likes) VALUES (:unique_id, :user, :image, :title, :caption, :datetime, :likes)";
            $statement = $db->prepare($query);
            $statement->bindValue(':unique_id', $unique_id);
            $statement->bindValue(':user', $user);
            $statement->bindValue(':image', $image);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':caption', $caption);
            $statement->bindValue(':datetime', $datetime);
            $statement->bindValue(':likes', $likes);
            $statement->execute();
            $statement->closeCursor();
        }
    }

header("Location: dashboard.php");

?>