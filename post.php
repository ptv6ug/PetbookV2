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
        <title>Create a Post</title>
        <script type="text/javascript" src="js/index.js"></script>
    </head>

    <body>
        <?php include('header.php'); ?>

        <?php
        session_start();
        if (isset($_SESSION['user'])) {
        ?>

        <div class="container" id="postForm">
            <h1>Create a Post</h1><br>
            <form name="postForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <!-- Hidden input of username --> 
                <input type="hidden" id="inputUsername" name="username" value="<?php echo $_SESSION['user'] ?>" />

                <!-- Select a photo button-->
                <!-- <a href="#" class="btn btn-primary">Select a Photo</a><br><br> -->
                <div class="form-group">
                    <label for="inputFile">Choose a Photo</label><br/>
                    <input type="file" id="inputFile" name="image" />
                </div>

                <!-- Title text area-->
                <div class="form-group">
                  <label for="inputTitle">Provide a Title</label><br>
                  <textarea rows="1" id="inputTitle" name="title" style="width: 100%" placeholder="Title here"></textarea>
                </div>

                <!-- Caption text area-->
                <div class="form-group">
                  <label for="inputCaption">Provide a Caption</label><br>
                  <textarea id="inputCaption" name="caption" rows="8" style="width: 100%" placeholder="Caption here"></textarea>
                </div>

                <!--Post button-->
                <!-- <a href="dashboard.php" formaction="post-to-db.php" class="btn btn-success">Post!</a> -->
                <input type="submit" class="btn btn-light" formaction="post-to-db.php" value="Post" />
            </form>
        </div>

        <?php
        } else {
            header('Location: index.php');
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
