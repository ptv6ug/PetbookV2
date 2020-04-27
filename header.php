<?php 
ob_start();
session_start(); 
?>

<header>
  <!-- Ryan Riley -->
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
        <li class="nav-item">
            <a class="nav-link" href="http://localhost:4200">Contact Us</a>
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
        <input type="text" id="inputSearch" class="form-control" name="keyword" />
        <div class="divider"></div>
        <input type="submit" class="btn btn-outline-success my-2 my-sm-0" formaction="search-db.php" value="Search" />
      </form>
    </div>

  </nav>
</header>
