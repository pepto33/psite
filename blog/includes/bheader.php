<?php
$file1 = 'includes/config.php';
if (file_exists($file1))
  include($file1); ?>
<!--================ Start Header Menu Area  =================-->
<!doctype html>
<html lang="ru" class="h-100">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>peptoБлог</title>
  <link rel="shortcut icon" href="/images/favicon.ico">
  <!--  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" /> -->
  <script src="https://kit.fontawesome.com/766ac56043.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/vendor/bootstrap.min.css">
  <script type="text/javascript" src="/vendor/jquery-3.6.0.min.js"></script>
  <script src="/vendor/766ac56043.js" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column h-100">
  <header>
    <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="/"><img src="/images/logo.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="nav navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/blog/index.php">Блог</a>
          </li>
        </ul>
        <ul class="nav navbar-nav">
          <?php
          if (isset($_SESSION['username'])) {
            echo '<li class="nav-item"><a class="nav-link" href="admin/index.php">Панель настроек </a></li>' .
              '<li class="nav-item"><a class="nav-link text-info" href="admin/pers_area.php">' . $_SESSION['username'] . '</a></li>' .
              '<li class="nav-item"><a class="nav-link" href="admin/logout.php">Выход</a></li>';
          } else { ?>
            '<li class="nav-item"><a class="nav-link" href="admin/add-user.php">Регистрация</a></li>' .
            '<li class="nav-item"><a class="nav-link" href="admin/login.php">Вход</a></li>';
          <?php } ?>
        </ul>
      </div>
    </nav>
  </header>