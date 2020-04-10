<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="UTF-8"> <html lang="en">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Pauline Vu & Ryan Riley">
        <!-- <meta name="keywords" content="define keywords for search engines"> -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/main.css">
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
        <title>Timeline</title>
        <script type="text/javascript" src="js/index.js"></script>
    </head>

    <body>
        <?php include('header.php'); ?>

        <?php
        session_start();
        if (isset($_SESSION['user'])) {
        ?>

        <div class="container" id="cardContainer">
            <?php require("connect-db.php"); ?>

            <h1>Email: <?php echo $_SESSION['email']; ?> </h1>
            <h1>Username: <?php echo $_SESSION['user']; ?> </h1>
            <h1>Password: <?php echo $_SESSION['pwd']; ?> </h1>
            
            <!-- card #1 -->
            <div class="card">
                <img src="images/jae-park-7GX5aICb5i4-unsplash.jpg" class="card-img-top" alt="meowing cat">
                <div class="card-body">
                  <button type="button" class="btn btn-secondary" id="like-btn" value="Like" onclick="increaseLike1()">
                    <span class="fa fa-heart"></span>
                  </button>
                  <a id="likes1">0</a> likes
                  <h5 class="card-title">she screm</h5>
                  <p class="card-text">Cookie is screaming at me because I didn't feed her since 20 minutes ago.</p>
                  <a href="detailCookieExample.html" class="btn btn-primary">Add a comment</a>
                </div>
                <div class="card-footer text-muted">Posted 2 minutes ago</div>
            </div>
            
        </div>

        <?php
        } else {
            header('Location: login.php');
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
