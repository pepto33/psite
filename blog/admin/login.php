<?php include('admin_header.php');
if ($user && $user->is_logged_in()) {
	header('Location: persarea.php');
}
?>

<title>Вход администратора</title>
<main role="main" class="flex-shrink-0">
	<div class="container col-md-4 col-md-offset-4">
		<br><br><br>
		<?php
		if (isset($_GET['action'])) {
			if ($_GET['action'] == "success") {
				echo '<p class="text-center text-success">Пользователь успешно зарегистрирован! <br> Введите учетные данные для входа.</p>';
			}
		}
		if (isset($_POST['submit'])) {
			$username = trim($_POST['email']);
			$password = trim($_POST['password']);
			if ($user->login($username, $password)) {
				header('Location: persarea.php');
				exit;
			} else {
				$message = '<p class="error text-center text-danger">Не верный логин или пароль</p>';
			}
		}
		if (isset($message)) {
			echo $message;
		}
		?>

		<form class="form-signin" action="" method="post">
			<h2 class="text-center">Вход</h2>
			<hr>
			<label class="sr-only">Email адрес</label>
			<input type="email" name="email" class="form-control" placeholder="Email адрес" required autofocus />
			<br>
			<label class="sr-only">Пароль</label>
			<input type="password" name="password" class="form-control" placeholder="Пароль" required />
			<br>
			<button class="btn btn-lg btn-secondary btn-block" type="submit" name="submit">Вход</button>
		</form>
		<br><br>
	</div>
</main>
<?php include('../includes/bfooter.php') ?>