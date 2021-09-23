<?php include('admin_header.php'); ?>
<main role="main" class="flex-shrink-0">
	<div class="container">
		<h6 class="text-center mt-5">Добавить пользователя</h6>
		<?php
		if (isset($_POST['submit'])) {
			extract($_POST);
			if ($password != $passwordConfirm) {
				$error[] = 'Пароли не совпадают.';
			}
			if (!isset($error)) {
				try {
					$stmt = $db->prepare('INSERT INTO blog_members (username,password,email) VALUES (:username, :password, :email)');
					$stmt->execute(array(
						':username' => $username,
						':password' => $password,
						':email' => $email
					));
					header('Location: users.php?action=added');
					exit;
				} catch (PDOException $e) {
					echo $e->getMessage();
				}
			}
		}
		if (isset($error)) {
			foreach ($error as $error) {
				echo '<p class="error">' . $error . '</p>';
			}
		}
		?>
		<form action='' method='post' class="w-50 m-auto">
			<div class="form-group">
				<label>Имя пользователя</label>
				<input type="text" class="form-control" name='username' required>
			</div>
			<div class="form-group">
				<label>Пароль</label>
				<input type="password" class="form-control" name='password' required>
			</div>
			<div class="form-group">
				<label>Подтвердите пароль</label>
				<input type="password" class="form-control" name='passwordConfirm' required>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name='email' required>
			</div>
			<input type='submit' name='submit' value='Добавить пользователя' class='btn btn-primary'>
		</form>
	</div>
</main>

<?php include('../includes/bfooter.php') ?>