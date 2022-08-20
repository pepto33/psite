<?php
ob_start();
session_start(); ?>
<!--================ Start Header Menu Area  =================-->
<!doctype html>
<html lang="ru" class="h-100 w-100">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>pSite</title>
  <link rel="shortcut icon" href="/images/favicon.ico">
  <link rel="stylesheet" href="vendor/bootstrap.min.css">
  <!--      <link rel="stylesheet" href="vendor/alertify.min.css"> -->
  <link rel="stylesheet" href="styles/styles.css">
  <script type="text/javascript" src="/vendor/jquery-3.6.0.min.js"></script>
  <script src="/vendor/popper.min.js"></script>
  <script src="/vendor/bootstrap.min.js"></script>
  <script type="text/javascript" src="/vendor/bootbox.min.js"></script>
  <script type="text/javascript" src="/vendor/bootbox.locales.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <!--      <script type="text/javascript" src="/vendor/alertify.min.js"></script> -->
  <script type="text/javascript" src="/js/timerny.js"></script>
  <script type="text/javascript" src="/js/timerrev.js"></script>
  <script type="text/javascript" src="/js/timerm.js"></script>
  <script type="text/javascript" src="/js/dwatch.js"></script>
  <!--      <script src="https://kit.fontawesome.com/766ac56043.js" crossorigin="anonymous"></script> -->
  <script src="/vendor/766ac56043.js"></script>
</head>

<body class="d-flex flex-column h-100">
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="/"><img src="/images/logo.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blog/index.php">Блог</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact">Контакты</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-list-alt"></i><span>Страницы</span></a>
            <div class="dropdown-menu bg-secondary" aria-labelledby="navbarDropdown">
              <a class=" dropdown-item" href="abc">АБВГ</a>
              <a class="dropdown-item" href="/sfg/index.php">Галерея</a>
              <a class="dropdown-item" href="/phAlbum/phAlbum.php">Галерея 2</a>
              <a class="dropdown-item" href="coffee_mashine">Кофе-машина</a>
              <a class="dropdown-item" href="xo">Нолики крестики</a>
              <a class="dropdown-item" href="calc">Калькулятор</a>
              <a class="dropdown-item" href="clock">Часы</a>
              <a class="dropdown-item" href="tetris">Тетрис</a>
              <a class="dropdown-item" href="/pages/pingpong.html">Пинг-понг</a>
              <a class="dropdown-item" href="27isfunc">27 важных однострочных функций JavaScript, используемых разработчиками ежедневно</a>
<!--              <a class="dropdown-item" href="chess">Шахматы</a> -->
             <a class="dropdown-item" href="pages/chess/chess.html">Шахматы</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Сайты</a>
            <div class="dropdown-menu bg-secondary" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/sites/ubereats/index.html" target="_blank">UberEats</a>
              <a class="dropdown-item" href="/sites/nlk/index.html" target="_blank">НЛК</a>
              <a class="dropdown-item" href="/sites/PiperNet/index.html" target="_blank">PiperNet</a>
              <a class="dropdown-item" href="/sites/star/index.html">Звезда</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pages/clock1/index.html">Часы</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/examples/index.html" target="_blank">examples</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pages/blk.html" target="_blank">blk</a>
          </li>
        </ul>
        <ul class="nav navbar-nav">
          <?php
          if (isset($_SESSION['username'])) {
            echo '<li class="nav-item"><a class="nav-link" href="/blog/admin/index.php">Панель настроек </a></li>' .
              '<li class="nav-item"><a class="nav-link text-info" href="/blog/admin/persarea.php">' . $_SESSION['username'] . '</a></li>' .
              '<li class="nav-item"><a class="nav-link" href="/blog/admin/logout.php">Выход</a></li>';
          } else { ?>
            '<li class="nav-item"><a class="nav-link" href="/blog/admin/add-user.php">Регистрация</a></li>' .
            '<li class="nav-item"><a class="nav-link" href="/blog/admin/login.php">Вход</a></li>';
          <?php } ?>
        </ul>
        <a href="#"><i id="pBell" class="far fa-bell text-decoration-none text-info" title="Напоминалка"></i></a>
      </div>
    </nav>
    <br>
    <div class="head-row mt-5">
      <div class="row">
        <div id="timerRev" class="text-center text-success align-middle col-md-4">infoHead</div>
        <div id="clock" class="text-center text-success col-md-4" title="Часы">Часы</div>
        <div id="timerNy" class="text-center text-success col-md-4">До нового года...</div>
      </div>
    </div>
    <div class="head-row mt-1">
      <div class="row">
        <div class="text-center text-success align-middle col-md-12">
          <div class="weather">
            <span class="city"></span>,
            ip <span class="ip"></span>,
            <br>
            Температера: <span class="temp"></span>°C,
            Влажность: <span class="humidity"></span>%,
            Ветер: <span class="wind"></span> км/ч
          </div>
        </div>
      </div>
    </div>
  </header>

  <!--================ End Header Menu Area =================-->
  <?php echo $content ?>
  <!--================ Start footer Area  =================-->
  <footer class="footer mt-2 py-3 bg-dark text-center">
    <div class="container">
      <div class="head-row hb">
        <div class="row">
          <div id="20230303" class="text-center text-success align-middle col-md-4"><p title="А вот и я!">До ...</p></div>
          <div id="20230711" class="text-center text-success col-md-4">До ...</div>
          <div id="20230910" class="text-center text-success col-md-4">До ...</div>
        </div>
      </div>
      <span class="text-muted">©2021 Все права защищены</span>
    </div>
  </footer>
</body>
<script type="text/javascript" src="/js/main.js"></script>

</html>
<!--================ End footer Area =================-->