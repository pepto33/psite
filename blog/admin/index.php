<?php include('admin_header.php');
if (!$user->is_logged_in()) {
	header('Location: login.php');
}
if (isset($_GET['delpost'])) {
	$stmt = $db->prepare('DELETE FROM blog_posts WHERE postID = :postID');
	$stmt->execute(array(':postID' => $_GET['delpost']));
	header('Location: index.php?action=удален');
	exit;
}
?>
<main role="main" class="flex-shrink-0">
	<div class="container">
		<h4 class="text-center btn btn-lg btn-secondary btn-block">Посты</h4>
		<?php
		if (isset($_GET['action'])) {
			echo '<h3>Пост ' . $_GET['action'] . '.</h3>';
		}
		?>
		<table class="table table-bordered table-hover table-striped">
			<tr class="thead-dark">
				<th>Заголовок</th>
				<th>Автор</th>
				<th>Дата</th>
				<th>действие</th>
			</tr>
			<?php
			try {
				if ($_SESSION['role'] != 1)
					$stmt = $db->query('SELECT * FROM blog_posts bp, blog_members bm WHERE bp.memberID = bm.memberID and bm.memberID = ' . $_SESSION['memberID'] . ' ORDER BY postID DESC');
				else
					$stmt = $db->query('SELECT * FROM blog_posts bp, blog_members bm WHERE bp.memberID = bm.memberID ORDER BY postID DESC');
				while ($row = $stmt->fetch()) {
					echo '<tr>';
					echo '<td>' . $row['postTitle'] . '</td>';
					echo '<td>' . $row['username'] . '</td>';
					echo '<td>' . date('Y-m-d H:i:s', strtotime($row['postDate'])) . '</td>';
			?>
					<td>
						<a class="text-dark font-weight-bold" href="edit-post.php?id=<?php echo $row['postID']; ?>">Изменить</a> |
						<a class="text-dark font-weight-bold" href="javascript:delpost('<?php echo $row['postID']; ?>','<?php echo $row['postTitle']; ?>')">Удалить</a>
					</td>
			<?php
					echo '</tr>';
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
			?>
		</table>
		<p align="center"><a href='add-post.php' class='btn btn-lg btn-secondary btn-block'>Добавит пост</a></p>
	</div>
</main>

<?php include('../includes/bfooter.php') ?>