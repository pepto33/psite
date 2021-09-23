<?php include('admin_header.php'); ?>
<main role="main" class="flex-shrink-0">
	<div class="container mb-5">
		<h3>Добавить пост</h3>
		<?php
		//if form has been submitted process it
		if (isset($_POST['submit'])) {
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			if (isset($_POST["submit"])) {
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if ($check !== false) {
					$uploadOk = 1;
				} else {
					echo "Файл не картинка.";
					$uploadOk = 0;
				}
			}
			if (file_exists($target_file)) {
				echo "Файл не существует.";
				$uploadOk = 0;
			}
			if (
				$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif"
			) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			if ($uploadOk == 0) {
				echo "Файл не загружен.";
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				} else {
					echo "Ошибка загрузки файла.";
				}
			}
			$_POST = array_map('stripslashes', $_POST);
			extract($_POST);
			if ($postDesc == '') {
				$error[] = 'Введите описание.';
			}
			if ($postCont == '') {
				$error[] = 'Введите содержание.';
			}
			if (!isset($error)) {
				try {
					//insert into database
					$stmt = $db->prepare('INSERT INTO blog_posts (memberID,postTitle,postDesc,postCont,postDate,thumbnail) VALUES (:memberID, :postTitle, :postDesc, :postCont, :postDate, :thumbnail)');
					$stmt->execute(array(
						':memberID' => $_SESSION['memberID'],
						':postTitle' => $postTitle,
						':postDesc' => $postDesc,
						':postCont' => $postCont,
						':postDate' => date('Y-m-d H:i:s'),
						':thumbnail' => $target_file
					));
					//redirect to index page
					header('Location: index.php?action=added');
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
		<form action='' method='post' enctype='multipart/form-data'>
			<div class="form-group">
				<label>Заголовок</label><br>
				<input type='text' name='postTitle' required>
				<div class="form-group">
					<label>Картинка</label><br>
					<input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" required>
				</div>
				<div class="form-group">
					<label>Описание</label><br>
					<textarea name='postDesc' cols='80' rows='4'><?php if (isset($error)) {
																		echo $_POST['postDesc'];
																	} ?></textarea>
				</div>
				<div class="form-group">
					<label>Содержание</label><br>
				</div>
				<div class="form-group">
					<textarea name='postCont' cols='80' rows='13'><?php if (isset($error)) {
																		echo $_POST['postCont'];
																	} ?></textarea>
				</div>
				<input type='submit' name='submit' value='Отправить' class='btn btn-primary'>
		</form>
	</div>
	</div>
</main>
<?php include('../includes/bfooter.php') ?>