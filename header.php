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
            <a class="nav-link" href="dashboard.php">Dashboard </a>
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
      <form class="form-inline my-2 my-lg-0">
        <a href="post.html" class="btn btn-danger" id="newPostDashboard">New Post</a>
        <div class="divider"></div>
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
</header>