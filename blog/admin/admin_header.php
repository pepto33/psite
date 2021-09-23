<?php include('../includes/config.php'); ?>

<!doctype html>
<html lang="ru">

<head>
	<meta charset="utf-8">
	<title>Панель администратора</title>
	<link rel="shortcut icon" href="/images/favicon.ico">
	<link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sticky-footer-navbar/"> -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" />
	<script src="https://kit.fontawesome.com/766ac56043.js" crossorigin="anonymous"></script>
	<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		tinymce.init({
			selector: "textarea",
			plugins: [
				"advlist autolink lists link image charmap print preview anchor",
				"searchreplace visualblocks code fullscreen",
				"insertdatetime media table contextmenu paste"
			],
			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
		});
	</script>
	<script language="JavaScript" type="text/javascript">
		function delpost(id, title) {
			if (confirm("Are you sure you want to delete '" + title + "'")) {
				window.location.href = 'index.php?delpost=' + id;
			}
		}

		function deluser(id, title) {
			if (confirm("Вы уверенны что хотите удалить '" + title + "'")) {
				window.location.href = 'users.php?deluser=' + id;
			}
		}
	</script>
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
				<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1) { ?>
					<li class="nav-item"><a class="nav-link" href='users.php'>Пользователи</a></li>
				<?php } ?>
			</ul>
			<ul class="nav navbar-nav navbar-right bg-dark">
				<li class="nav-item"><a class="nav-link" href="../">Посты</a></li>
				<li class="nav-item"><a class="nav-link" href='logout.php'>Выход</a></li>
			</ul>
		</div>
	</nav>
	<br>
	<br>