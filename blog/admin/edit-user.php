<?php include('admin_header.php'); ?>
<main role="main" class="flex-shrink-0">
	<div class="jumbotron">
		<h2>Редактирование пользователя</h2>
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
			if (!isset($error)) {
				try {
					if (isset($password)) {
						$stmt = $db->prepare('UPDATE blog_members SET username = :username, password = :password, email = :email WHERE memberID = :memberID');
						$stmt->execute(array(
							':username' => $username,
							':password' => $password,
							':email' => $email,
							':memberID' => $memberID
						));
					} else {
						$stmt = $db->prepare('UPDATE blog_members SET username = :username, email = :email WHERE memberID = :memberID');
						$stmt->execute(array(
							':username' => $username,
							':email' => $email,
							':memberID' => $memberID
						));
					}
					header('Location: users.php?action=updated');
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
			$stmt = $db->prepare('SELECT memberID, username, email FROM blog_members WHERE memberID = :memberID');
			$stmt->execute(array(':memberID' => $_GET['id']));
			$row = $stmt->fetch();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		?>
		<form action='' method='post'>
			<input type='hidden' name='memberID' value='<?php echo $row['memberID']; ?>'>
			<p><label>Имя пользователя</label><br />
				<input type='text' name='username' value='<?php echo $row['username']; ?>'>
			</p>
			<p><label>Пароль, только для изменения</label><br />
				<input type='password' name='password' value=''>
			</p>
			<p><label>Подтвердите пароль</label><br />
				<input type='password' name='passwordConfirm' value=''>
			</p>
			<p><label>Email</label><br />
				<input type='text' name='email' value='<?php echo $row['email']; ?>'>
			</p>
			<p><input type='submit' name='submit' value='Обновить пользователя'></p>
		</form>
	</div>
</main>
<?php include('../includes/bfooter.php') ?>