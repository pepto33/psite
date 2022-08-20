<?php include('admin_header.php'); ?>
<main role="main" class="flex-shrink-0">
	<div class="container">
		<h4 class="text-center mt-5">Добавить пользователя</h4>
		<?php
		if (isset($_POST['submit'])) {
			extract($_POST);
			if ($password != $passwordConfirm) {
				$error[] = 'Пароли не совпадают.';
			}
			if (!isset($error)) {
				try {
					$stmt = $db->prepare('INSERT INTO blog_members (username,password,email,role) VALUES (:username, :password, :email, :role)');
					$stmt->execute(array(
						':username' => $username,
						':password' => $password,
						':email' => $email,
						':role' => $role
					));
					if ($_SESSION['role'] == 1) {
						header('Location: users.php?action=добавлен');
						exit;
					} else {
						header('Location: login.php?action=success');
					}
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
				<label>Пароль</label>
				<input type="password" class="form-control" name='password' required>
				<label>Подтвердите пароль</label>
				<input type="password" class="form-control" name='passwordConfirm' required>
				<label>Email</label>
				<input type="email" class="form-control" name='email' required>
				<?php if ($row['role'] | $_SESSION['role'] == 1) {
					echo '<label>Роль</label>' .
						'<select class="custom-select" class="form-control" name="role" required>' .
						'<option selected>Выбрать...</option>' .
						'<option value="1">Администратор</option> ' .
						'<option value="2">Пользователь</option>' .
						'</select>';
				} else {
					echo '<label>Роль</label>' .
						'<select class="custom-select" class="form-control" name="role" required>' .
						'<option selected value="2">Пользователь</option>' .
						'</select>';
				} ?>
			</div>
			<p align="center"><input type='submit' name='submit' value='Добавить пользователя' class='btn btn-lg btn-secondary btn-block'></p>
		</form>
	</div>
</main>

<?php include('../includes/bfooter.php') ?>