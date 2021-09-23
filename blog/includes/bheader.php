<?php
$file1 = 'includes/config.php';
if (file_exists($file1))
  include($file1); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <title>Blog</title>
  <link rel="shortcut icon" href="/images/favicon.ico">
  <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sticky-footer-navbar/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" />
  <script src="https://kit.fontawesome.com/766ac56043.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="/"><img src="/images/logo.png" alt=""></a>
      </div>
      <ul class="nav navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/blog/index.php">Блог</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right bg-dark">
        <?php
        if (isset($_SESSION['memberID'])) { ?>
          <li class="nav-item"><a class="nav-link" href="admin/index.php">Панель настроек </a></li>
          <li class="nav-item"><a class="nav-link" href="admin/logout.php">Выход</a></li>
        <?php } else { ?>
          <li class="nav-item"><a class="nav-link" href="admin/login.php">Вход</a></li>
        <?php } ?>
      </ul>
    </div>
  </nav>