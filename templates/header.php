<?php
// session_start();

//autoload files (currently just session.php)

// require __DIR__ . '/../vendor/autoload.php'; 
  
//authenticated function comes from session.php

// $loggedin = authenticated();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eeevee Log</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="templates/assets/css/style.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

<body class="body">
  <nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
    <div class="container px-5">
      <a class="navbar-brand" href="#">
        <img src="images/eevee.svg" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="top.php">Leaders
             
            </a>
          </li>
          <?php if ($loggedin) { ?>

          <li class="nav-item">
            <a class="nav-link" href="add.php">Add Character</a>
          </li>

          <?php } else echo ""; ?>
          
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>



          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>

          <?php
          if (!$loggedin) {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
          <?php
          } else echo '';
          ?>

          <?php if ($loggedin) { ?>

            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>

          <?php } else echo ""; ?>

          <?php if (!$loggedin) { ?>

            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>

          <?php } else echo ''; ?>
          <li class="nav-item">
            <a href="#search" class="nav-link" id="search_icon">
              <i class="fas fa-search"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>