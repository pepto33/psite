<?php include('admin_header.php'); ?>

<main role="main" class="flex-shrink-0">
	<div class="container">
		<hr>
		<h6 class="text-center">Пользователи</h6>
		<?php
		if (isset($_GET['action'])) {
			echo '<h3>User ' . $_GET['action'] . '.</h3>';
		}
		?>
		<table class="table table-bordered table-hover table-striped">
			<tr class="thead-dark">
				<th>Имя пользователя</th>
				<th>Email</th>
				<th>Действие</th>
			</tr>
			<?php
			try {
				$stmt = $db->query('SELECT memberID, username, email FROM blog_members ORDER BY username');
				while ($row = $stmt->fetch()) {
					echo '<tr>';
					echo '<td>' . $row['username'] . '</td>';
					echo '<td>' . $row['email'] . '</td>';
			?>
					<td>
						<a href="edit-user.php?id=<?php echo $row['memberID']; ?>">Изменить</a>
						<?php if ($row['memberID'] != 1) { ?>
							| <a href="javascript:deluser('<?php echo $row['memberID']; ?>','<?php echo $row['username']; ?>')">Удалить</a>
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
			<p align="center"><a class='btn btn-primary' href='add-user.php'>Добавить пользователя</a></p>
		<?php } ?>
	</div>
</main>
<?php include('../includes/bfooter.php') ?>