<?php include('admin_header.php');
if (!$user->is_logged_in()) {
	header('Location: login.php');
}
if (isset($_GET['deluser'])) {
	$stmt = $db->prepare('DELETE FROM blog_members WHERE memberID = :memberID');
	$stmt->execute(array(':memberID' => $_GET['deluser']));
	header('Location: users.php?action=удален');
	exit;
}
?>
<main role="main" class="flex-shrink-0">
	<div class="container">
		<h4 class="text-center btn btn-lg btn-secondary btn-block">Пользователи</h4>
		<?php
		if (isset($_GET['action'])) {
			echo '<h4>Пользователь ' . $_GET['action'] . '.</h4>';
		}
		?>
		<table class="table table-bordered table-hover table-striped">
			<tr class="thead-dark">
				<th>Имя пользователя</th>
				<th>Email</th>
				<th>Роль</th>
				<th>Действие</th>
			</tr>
			<?php
			try {
				$stmt = $db->query('SELECT memberID, username, email, role FROM blog_members ORDER BY username');
				while ($row = $stmt->fetch()) {
					echo '<tr>';
					echo '<td>' . $row['username'] . '</td>';
					echo '<td>' . $row['email'] . '</td>';
					if ($row['role'] == 1) {
						echo '<td>Администратор</td>';
					} else {
						echo '<td>Пользователь</td>';
					}
			?>
					<td>
						<a class="text-dark font-weight-bold" href="edit-user.php?id=<?php echo $row['memberID']; ?>">Изменить</a>
						<?php if ($row['memberID'] != 1) { ?>
							| <a class="text-dark font-weight-bold" href="javascript:deluser('<?php echo $row['memberID']; ?>','<?php echo $row['username']; ?>')">Удалить</a>
						<?php } ?>
					</td>
			<?php
					echo '</tr>';
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
			?>
		</table>
		<?php if ($_SESSION['role'] == 1) { ?>
			<p align="center"><a class='btn btn-lg btn-secondary btn-block' href='add-user.php'>Добавить пользователя</a></p>
		<?php } ?>
	</div>
</main>

<?php include('../includes/bfooter.php') ?>