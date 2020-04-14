<?php
    // Pauline Vu
    require('connect-db.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $unique_id = trim($_POST['uniqueID']); // use existing post ID, no need to generate a new one with uniqueid()
        // $user = trim($_POST['username']); // unneeded for post update
        $image = trim($_POST['oldImage']); // by default, use old image
        if (strlen(basename($_FILES["image"]["tmp_name"])) > 0) { // if a new image was chosen, change it here
            // code to upload image is from: 
            // https://www.w3schools.com/php/php_file_upload.asp
            $dir = "C:/xampp/htdocs/PetbookV2/uploaded_images/"; // full path of target directory
            $image_to_save = $dir . basename($_FILES["image"]["tmp_name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $image_to_save);
            $image = basename($_FILES["image"]["tmp_name"]);
        }
        $title = trim($_POST['title']);
        $caption = trim($_POST['caption']);
        // date_default_timezone_set('US/Eastern'); // unneeded
        // $datetime = date('m/d/Y h:i a', time());
        // $likes = 0; // unneeded

        if (isset($unique_id) && isset($image) && isset($title) && isset($caption)) {
            $query = "UPDATE posts SET image=:image, title=:title, caption=:caption WHERE uniqueID=:unique_id";
            $statement = $db->prepare($query);
            $statement->bindValue(':unique_id', $unique_id);
            $statement->bindValue(':image', $image);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':caption', $caption);
            $statement->execute();
            $statement->closeCursor();
        }
    }

header("Location: dashboard.php");

?>