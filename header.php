<?php session_start(); ?>

<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
        </li>
        <?php
        if (isset($_SESSION['user'])) {
          echo '<li class="nav-item">
            <a class="nav-link" href="logout.php">Logout </a>
          </li>';
        } else {
          echo '<li class="nav-item">
            <a class="nav-link" href="index.php">Login </a>
          </li>';
        }
        ?>
      </ul>
      <form name="searchMethod" class="form-inline my-2 my-lg-0" action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
        <a href="post.php" class="btn btn-danger" id="newPostDashboard">New Post</a>
        <div class="divider"></div>
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>

    <?php

    function search() {

      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
          if (NULL != trim($_GET['keyword'])) {
            $keyword = trim($_GET['keyword']);
            try {
                $db = new PDO("mysql:host=localhost;dbname=petbook", "root", "");
                $date = date('hi');

                $query = "CREATE TABLE search_results" . $_SESSION['user'] . $date . " SELECT uniqueID, username, image, title, caption, timestamp, likes FROM posts
                WHERE uniqueID LIKE '%$keyword%' OR username LIKE '%$keyword%' OR image LIKE '%$keyword%' OR title LIKE '%$keyword%'
                OR caption LIKE '%$keyword%' OR timestamp LIKE '%$keyword%' OR likes LIKE '%$keyword%';";
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
        }
    }
    
    error_reporting(0);
    search();

     ?>

  </nav>
</header>
