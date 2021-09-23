<?php include('admin_header.php');
//check if already logged in
if ($user && $user->is_logged_in()) {
	header('Location: index.php');
}
?>

<title>Вход администратора</title>
<main role="main" class="flex-shrink-0">
	<div class="container col-md-4 col-md-offset-4">
		<?php
		//process login form if submitted
		if (isset($_POST['submit'])) {
			$username = trim($_POST['email']);
			$password = trim($_POST['password']);
			if ($user->login($username, $password)) {
				//logged in return to index page
				header('Location: index.php');
				exit;
			} else {
				$message = '<p class="error">Не верный логин или пароль</p>';
			}
		} //end if submit
		if (isset($message)) {
			echo $message;
		}
		?>
		<br><br><br>
		<form class="form-signin" action="" method="post">
			<h2>Вход</h2>
			<hr>
			<label class="sr-only">Email адрес</label>
			<input type="text" name="email" class="form-control" placeholder="Email адрес" required autofocus />
			<br>
			<label class="sr-only">пароль</label>
			<input type="password" name="password" class="form-control" placeholder="Password" required />
			<br>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Вход</button>
		</form>
		<br><br>
	</div>
</main>
<?php include('../includes/bfooter.php') ?>