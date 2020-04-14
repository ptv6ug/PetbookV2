<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"> <html lang="en">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Pauline Vu & Ryan Riley">
        <!-- <meta name="keywords" content="define keywords for search engines"> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/main.css">
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
        <title>Update this Post</title>
        <script type="text/javascript" src="js/index.js"></script>
    </head>

    <body>
        <?php include('header.php'); ?>

        <?php
        if (isset($_SESSION['user'])) {
            require('connect-db.php');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $unique_id = trim($_POST['uniqueID']);

                $query = "SELECT * FROM posts where uniqueID=:unique_id";
                $statement = $db->prepare($query);
                $statement->bindValue(':unique_id', $unique_id);
                $statement->execute();
                $results = $statement->fetchAll();
                $statement->closecursor();
                
                foreach ($results as $result) {
                    echo '
                    <div class="container" id="postForm">
                        <h1>Update this Post</h1><br>
                        <form name="updateForm" action="<?php ' . $_SERVER['PHP_SELF'] . '?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="inputUniqueID" name="uniqueID" value="' . $result['uniqueID'] . '" />

                            <div class="form-group">
                                <label for="inputFile">Choose a Photo</label><br/>
                                <p>Current photo: ' . $result['image'] . '</p>
                                <input type="hidden" id="oldFile" name="oldImage" value="' . $result['image'] . '" />
                                <input type="file" id="inputFile" name="image" />
                            </div>

                            <div class="form-group">
                                <label for="inputTitle">Provide a Title</label><br>
                                <textarea rows="1" id="inputTitle" name="title" style="width: 100%">' . $result['title'] . '</textarea>
                            </div>

                            <div class="form-group">
                                <label for="inputCaption">Provide a Caption</label><br>
                                <textarea id="inputCaption" name="caption" rows="8" style="width: 100%">' . $result['caption'] . '</textarea>
                            </div>

                            <input type="submit" class="btn btn-light" formaction="update-to-db.php" value="Update" />
                        </form>
                    </div>';
                }
            }
        } else {
            header("Location: index.php");
        }
        ?>

        <footer>
            <small>© Pauline Vu & Ryan Riley</small>
        </footer>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
