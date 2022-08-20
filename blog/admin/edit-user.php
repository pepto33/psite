<?php include('admin_header.php'); ?>

<main role="main" class="flex-shrink-0">
	<div class="container">
		<h4 class="text-center mt-5">Редактирование пользователя</h4>
		<?php
		if (isset($_POST['submit'])) {
			extract($_POST);
			if ($username == '') {
				$error[] = 'Введить имя пользователя.';
			}
			if (strlen($password) > 0) {
				if ($password == '') {
					$error[] = 'Введите пароль.';
				}
				if ($passwordConfirm == '') {
					$error[] = 'Подтвердите пароль.';
				}
				if ($password != $passwordConfirm) {
					$error[] = 'Пароли не совпадают.';
				}
			}
			if ($email == '') {
				$error[] = 'Введите email адрес.';
			}
			if ($role == '') {
				$error[] = 'Введите роль.';
			}
			if (!isset($error)) {
				try {
					if (isset($password)) {
						$stmt = $db->prepare('UPDATE blog_members SET username = :username, password = :password, email = :email, role = :role WHERE memberID = :memberID');
						$stmt->execute(array(
							':username' => $username,
							':password' => $password,
							':email' => $email,
							':memberID' => $memberID,
							':role' => $role
						));
					} else {
						$stmt = $db->prepare('UPDATE blog_members SET username = :username, email = :email WHERE memberID = :memberID');
						$stmt->execute(array(
							':username' => $username,
							':email' => $email,
							':memberID' => $memberID,
							':role' => $role
						));
					}
					header('Location: users.php?action=добавлен');
					exit;
				} catch (PDOException $e) {
					echo $e->getMessage();
				}
			}
		}
		?>
		<?php
		if (isset($error)) {
			foreach ($error as $error) {
				echo $error . '<br />';
			}
		}
		try {
			$stmt = $db->prepare('SELECT memberID, username, email, role FROM blog_members WHERE memberID = :memberID');
			$stmt->execute(array(':memberID' => $_GET['id']));
			$row = $stmt->fetch();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		?>
		<form action='' method='post' enctype='multipart/form-data' class="w-50 m-auto">
			<div class="form-group">
				<input type='hidden' name='memberID' value='<?php echo $row['memberID']; ?>'>
				<label>Имя пользователя</label><br />
				<input type='text' name='username' class="form-control w-100" value='<?php echo $row['username']; ?>'>
				<label>Пароль, только для изменения</label><br />
				<input type='password' name='password' class="form-control w-100" value=''>
				<label>Подтвердите пароль</label><br />
				<input type='password' name='passwordConfirm' class="form-control w-100" value=''>
				<label>Email</label><br />
				<input type='email' name='email' class="form-control w-100" value='<?php echo $row['email']; ?>'>
				<label>Роль</label>
				<select class="custom-select" class="form-control" name='role' required>
					<option <?php if ($row['role'] == 1) {
								echo 'selected';
							} ?> value="1">Администратор</option>
					<option <?php if ($row['role'] == 2) {
								echo 'selected';
							} ?> value="2">Пользователь</option>
				</select>
			</div>
			<p align=" center"><input type='submit' name='submit' value='Обновить пользователя' class="btn btn-lg btn-secondary btn-block"></p>
		</form>
	</div>
</main>
<?php include('../includes/bfooter.php') ?>