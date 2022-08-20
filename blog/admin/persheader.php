<?php
ob_start();
session_start(); ?>

<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="icon" href="../img/Fevicon.png" type="image/png">
    <title>Личный кабинет</title>
</head>

<body class="d-flex flex-column">
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
                </ul>
                <ul class="nav navbar-nav">
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1) { ?>
                        <li class="nav-item"><a class="nav-link" href='users.php'>Пользователи</a></li>
                    <?php } ?>
                </ul>
                <ul class="nav navbar-nav">
                    <?php if (isset($_SESSION['username'])) {
                        echo '<li class="nav-item"><a class="nav-link" href="index.php">Посты</a></li>' .
                            '<li class="nav-item"><a class="nav-link text-info" href="persarea.php">' . $_SESSION['username'] . '</a></li>' .
                            '<li class="nav-item"><a class="nav-link" href="logout.php">Выход</a></li>';
                    } else {
                        echo '<li class="nav-item"><a class="nav-link" href="logout.php">Вход</a></li>';
                    } ?>
                </ul>
            </div>
        </nav>
    </header>