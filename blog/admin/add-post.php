<?php include('admin_header.php'); ?>

<main role="main" class="flex-shrink-0">
	<div class="container mb-5">
		<h4 class="text-center mt-5">Добавить пост</h4>
		<?php
		if (isset($_POST['submit'])) {
			$target_dir = "../uploads/";
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
				echo "Только JPG, JPEG, PNG & GIF файлы можно загрузить.";
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
					$stmt = $db->prepare('INSERT INTO blog_posts (memberID,postTitle,postDesc,postCont,postDate,thumbnail) VALUES (:memberID, :postTitle, :postDesc, :postCont, :postDate, :thumbnail)');
					$stmt->execute(array(
						':memberID' => $_SESSION['memberID'],
						':postTitle' => $postTitle,
						':postDesc' => nl2br($postDesc),
						':postCont' => nl2br($postCont),
						':postDate' => date('Y-m-d H:i:s'),
						':thumbnail' => $target_file
					));
					header('Location: index.php?action=добавлен');
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
		<form action='' method='post' enctype='multipart/form-data' class=" w-50 m-auto">
			<div class="form-group">
				<label>Заголовок</label><br>
				<input type='text' name='postTitle' class="w-100" required>
				<label>Картинка</label><br>
				<input type="file" class="btn btn-lg btn-secondary btn-block" name="fileToUpload" id="fileToUpload" required>
				<label>Описание</label><br>
				<textarea name='postDesc' cols='73' rows='4'><?php if (isset($error)) {
																	echo $_POST['postDesc'];
																} ?></textarea>
				<label>Содержание</label><br>
				<textarea name='postCont' cols='73' rows='13'><?php if (isset($error)) {
																	echo $_POST['postCont'];
																} ?></textarea>
				<p align="center"><input type='submit' name='submit' value='Отправить' class='btn btn-lg btn-secondary btn-block'></p>
			</div>
		</form>
	</div>
</main>

<?php include('../includes/bfooter.php') ?>