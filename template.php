    <!--================ Start Header Menu Area  =================-->
    <!doctype html>
    <html lang="ru" class="h-100">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>pSite</title>
      <link rel="shortcut icon" href="/images/favicon.ico">
      <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sticky-footer-navbar/">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
      <link rel="stylesheet" href="styles/styles.css">
      <script src="https://kit.fontawesome.com/766ac56043.js" crossorigin="anonymous"></script>
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
                <a class="nav-link" href="blog">Блог</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Что-то еще...</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact">Контакты</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-list-alt"></i></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="coffee_mashine">Кофе-машина</a>
                  <a class="dropdown-item" href="xo">Нолики крестики</a>
                  <a class="dropdown-item" href="calc">Калькулятор</a>
                  <a class="dropdown-item" href="clock">Часы</a>

                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--================ End Header Menu Area =================-->
      <?php echo $content ?>
      <!--================ Start footer Area  =================-->
      <footer class="footer mt-auto py-3 bg-dark text-center">
        <div class="container">
          <span class="text-muted">©2021 Все права защищены</span>
        </div>
      </footer>

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    </body>

    </html>
    <!--================ End footer Area =================-->