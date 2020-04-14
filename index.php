<!DOCTYPE html>
<html>
    <head>
        <!-- Ryan Riley -->
        <meta charset="UTF-8"> <html lang="en">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Pauline Vu & Ryan Riley">
        <!-- <meta name="keywords" content="define keywords for search engines"> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/main.css">
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
        <title>Login</title>
        <script type="text/javascript" src="js/index.js"></script>
    </head>

    <body>
        <?php include('header.php'); ?>

        <div class="container" id="frontPageIntro">
            <img src="images/pets_landing.png" alt="2 cats and 3 dogs" class="imgex">
            <h1 class="display-1">Petbook</h1>
            <h4>Share your pets with the world!</h4>
        </div>

        <div class="container" id="loginForm">
            <form name="loginForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                
                <div class="form-group">
                    <label for="inputEmailDesc">Email Address</label>
                    <input type="text" id="inputEmail" class="form-control" name="email" autofocus required />
                    <span class="error" id="inputEmailError"></span>
                </div>

                <div class="form-group">
                    <label for="inputUsernameDesc">Username</label>
                    <input type="text" id="inputUsername" class="form-control" name="username" required />
                    <span class="error" id="inputUsernameError"></span>
                </div>
                
                <div class="form-group">
                    <label for="inputPasswordDesc">Password</label>
                    <input type="password" id="inputPassword" class="form-control" name="password" required />
                    <span class="error" id="inputPasswordError"></span>
                </div>

                <div id="loginErrorPlaceholder"></div>

                <!-- <input type="button" class="btn btn-light" value="Login" onclick="validateLogin()"/> -->
                <input type="submit" class="btn btn-light" value="Login" />   
            </form>
        </div>

        <!-- <?php // session_start(); ?> -->

        <?php
        function login() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $email = trim($_POST['email']);
                $user = trim($_POST['username']);
                $pwd = htmlspecialchars($_POST['password']);
                $hash_pwd = "";

                if (isset($email) && isset($user) && isset($pwd)) {
                    if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
                        // if incorrect, show error
                        echo '<script type="text/javascript">' . 
                        'document.getElementById("loginErrorPlaceholder").innerHTML += "Please enter a valid email address";' .
                        '</script>';
                    }
                    else if (!ctype_alnum($user)) {
                        // if incorrect, show error
                        echo '<script type="text/javascript">' . 
                        'document.getElementById("loginErrorPlaceholder").innerHTML += "Username can only be made of numbers and letters.";' .
                        '</script>';
                    }
                    else {
                        try {
                            $db = new PDO("mysql:host=localhost;dbname=petbook", "root", "");
                  
                            $query = "SELECT email, username, password FROM users";
                            $statement = $db -> prepare($query);
                            $statement -> execute();
                            while ($data = $statement -> fetch()) {
                                if ($data['email'] == $email && $data['username'] == $user && $data['password'] == $pwd) {
                                    $hash_pwd = password_hash($pwd, PASSWORD_BCRYPT);
                                }
                            }
                        }
                        catch (PDOException $e) {
                            echo $e -> getMessage();
                        }
                        if (password_verify($pwd, $hash_pwd)) {
                            $_SESSION['email'] = $email;
                            $_SESSION['user'] = $user;
                            $_SESSION['pwd'] = $hash_pwd;
                            header("Location: dashboard.php");
                        } else {
                            // if incorrect, show error
                            echo "<script> 
                            document.getElementById('loginErrorPlaceholder').innerHTML += 'Incorrect password.'; 
                            </script>";
                        }
                    }
                }
            }
        }

        login();    
        ?>

        <footer>
            <small>© Pauline Vu & Ryan Riley</small>
        </footer>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
