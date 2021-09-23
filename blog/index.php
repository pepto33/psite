<?php include_once('../blog/includes/bheader.php'); ?>

<main role="main" class="flex-shrink-0">
	<div class="jumbotron">
		<?php
		try {
			echo '<div class="container">
					<div class="index-content">
					<h1>Блог</h1>
					<hr>';
			$stmt = $db->query('SELECT * FROM blog_posts bp, blog_members bm WHERE bp.memberID = bm.memberID ORDER BY postID DESC');
			while ($row = $stmt->fetch()) {
				echo '<div class="row">
				        <div class="col-lg-5 col-xl-5 pb-3">
				            <!--Featured image-->
				            <div class="view overlay rounded z-depth-2">
				            	<a href="viewpost.php?id=' . $row['postID'] . '">
				                <img src="admin/' . $row['thumbnail'] . '" alt="Изображение отсутствует"
				                    class="thumbnail img-responsive img-fluid">
				                </a>
				            </div>
				        </div>
				        <div class="col-lg-7 col-xl-7">
				            <h3 class="mb-4 font-weight-bold dark-grey-text">
				                <strong>' . $row['postTitle'] . '</strong>
				            </h3>
				            <p>' . $row['postDesc'] . '</p>
				            <p>от
				                <a>
				                    <strong>' . $row['username'] . '</strong>
				                </a>, ' . date('Y-m-d H:i:s', strtotime($row['postDate'])) . '</p>
				            <a href="viewpost.php?id=' . $row['postID'] . '" class="btn btn-success btn-md mb-3 bg-info">Читать</a>
				        </div>
				    </div>
				    <hr>';
			}
			echo '</div>
				</div>';
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		?>
	</div>
</main>
<?php include('includes/bfooter.php') ?>