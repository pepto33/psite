<?php include('admin_header.php'); ?>
<main role="main" class="flex-shrink-0">
	<div class="container">
		<h4 class="text-center mt-5">Изменить пост</h4>
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
					echo "Файл не изображение.";
					$uploadOk = 0;
				}
			}
			if (file_exists($target_file)) {
				echo "Файла не существует.";
				$uploadOk = 0;
			}
			if (
				$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif"
			) {
				echo "Только JPG, JPEG, PNG & GIF файла могут быть.";
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
			if ($postID == '') {
				$error[] = 'У этого сообщения отсутствует действительный идентификатор!';
			}
			if ($postTitle == '') {
				$error[] = 'Введите заголовок.';
			}
			if ($postDesc == '') {
				$error[] = 'Введите описание.';
			}
			if ($postCont == '') {
				$error[] = 'Введите содержание.';
			}
			if (!isset($error)) {
				try {
					if ($uploadOk == 1) {
						$stmt = $db->prepare('UPDATE blog_posts SET postTitle = :postTitle, postDesc = :postDesc, postCont = :postCont, thumbnail = :thumbnail WHERE postID = :postID');
						$stmt->execute(array(
							':postTitle' => $postTitle,
							':postDesc' => $postDesc,
							':postCont' => $postCont,
							':postID' => $postID,
							':thumbnail' => $target_file
						));
					} else {
						$stmt = $db->prepare('UPDATE blog_posts SET postTitle = :postTitle, postDesc = :postDesc, postCont = :postCont WHERE postID = :postID');
						$stmt->execute(array(
							':postTitle' => $postTitle,
							':postDesc' => $postDesc,
							':postCont' => $postCont,
							':postID' => $postID
						));
					}
					header('Location: index.php?action=обновлен');
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
			$stmt = $db->prepare('SELECT postID, postTitle, postDesc, postCont, thumbnail FROM blog_posts WHERE postID = :postID');
			$stmt->execute(array(':postID' => $_GET['id']));
			$row = $stmt->fetch();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		?>
		<form action='' method='post' enctype='multipart/form-data' class="w-50 m-auto">
			<div class="form-group">
				<input type='hidden' name='postID' value='<?php echo $row['postID']; ?>'>
				<p><label>Заголовок</label><br>
					<input type='text' name='postTitle' class="w-100" value='<?php echo $row['postTitle']; ?>'>
				</p>
				<p><label>Картинка</label><br>
					<input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-lg btn-secondary btn-block">
				</p>
				<p><label>Описание</label><br>
					<textarea name='postDesc' cols='73' rows='4'><?php echo $row['postDesc']; ?></textarea>
				</p>
				<p><label>Сожержание</label><br>
					<textarea name='postCont' cols='73' rows='13'><?php echo $row['postCont']; ?></textarea>
				</p>
				<p align="center"><input type='submit' name='submit' value='Загрузить' class="btn btn-lg btn-secondary btn-block"></p>
			</div>
		</form>
	</div>
</main>

<?php include('../includes/bfooter.php') ?>