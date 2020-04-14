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
        <title>Search Results</title>
        <script type="text/javascript" src="js/index.js"></script>
    </head>

    <body>
        <?php
        include('header.php');
        ?>

        <div class="container" id="cardContainer">
            <!-- For testing if you are in a session  -->
            <!-- <p>Email: <?php echo $_SESSION['email']; ?> </p>
            <p>Username: <?php echo $_SESSION['user']; ?> </p>
            <p>Password: <?php echo $_SESSION['pwd']; ?> </p> -->

            <?php
            if (isset($_SESSION['user'])) {
                require('connect-db.php');

                // To prepare a SQL statement, use the prepare() method of the PDO object
                //    syntax:   prepare(sql_statement)

                // To execute a SQL statement, use the bindValue() method of the PDO statement object
                // to bind the specified value to the specified param in the prepared statement
                //    syntax:   bindValue(param, value)
                // then use the execute() method to execute the prepared statement

                // Excute a SQL statement that doesn't have params
                $query = "SELECT * FROM search_results ORDER BY timestamp DESC";
                $statement = $db->prepare($query);
                $statement->execute();

                // fetchAll() returns an array for all of the rows in the result set
                $results = $statement->fetchAll();

                // closes the cursor and frees the connection to the server so other SQL statements may be issued
                $statement->closecursor();

                foreach ($results as $result) {
                        echo '
                        <div class="card">
                        <img src ="uploaded_images/' . $result['image'] . '" class="card-img-top" />
                            <div class="card-body">
                                <button type="button" class="btn btn-secondary" id="like-btn" value="Like" onclick="increaseLike1()">
                                <span class="fa fa-heart"></span>
                                </button>
                                <a id="likes1">' . $result['likes'] . '</a> likes
                                <h5 class="card-title">' . $result['title'] . '</h5>
                                <p class="card-text">' . $result['caption'] . '</p>
                                <a href="detailCookieExample.html" class="btn btn-primary">Add a comment</a>
                            </div>
                            <div class="card-footer text-muted">' . $result['timestamp'] . '</div>
                        </div>
                        ';
                }
            ?>
        </div>

        <?php
        } else {
            header('Location: index.php');
        }
        ?>

        <?php
            $query = "DROP TABLE search_results";
            $statement = $db->prepare($query);
            $statement->execute();
            $statement->closecursor();
        ?>

        <footer>
            <small>© Pauline Vu & Ryan Riley</small>
        </footer>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>