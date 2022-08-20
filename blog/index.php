<?php include_once('../blog/includes/bheader.php'); ?>

<main role="main" class="flex-shrink-0">
	<div class="jumbotron">
		<?php
		try {
			echo '<div class="container">
					<div class="index-content">
					<h1>peptoБлог</h1>
					<hr>';
			$stmt = $db->query('SELECT * FROM blog_posts bp, blog_members bm WHERE bp.memberID = bm.memberID ORDER BY postID DESC');
			while ($row = $stmt->fetch()) {
				echo '<div class="row">
				        <div class="col-lg-5 col-xl-5 pb-3">
				            <!--Featured image-->
				            <div class="view overlay rounded z-depth-2">
				            	<a href="viewpost.php?id=' . $row['postID'] . '">
				                <img src="admin/' . $row['thumbnail'] . '" alt="Изображение отсутствует"
				                    class="thumbnail img-fluid img-thumbnail">
				                </a>
				            </div>
				        </div>
				        <div class="col-lg-7 col-xl-7">
				            <h3 class="mb-4 font-weight-bold dark-grey-text">
				                <strong>' . html_entity_decode(htmlspecialchars($row['postTitle'])) . '</strong>
				            </h3>
				            <p>' . html_entity_decode(htmlspecialchars($row['postDesc'])) . '</p>
							<a class="text-dark font-weight-bold" href="viewpost.php?id=' . html_entity_decode(htmlspecialchars($row['postID'])) . '">Читать дальше...</a>
				            <p>от <a <i class="fa fa-user text-dark"> <strong>' .  html_entity_decode(htmlspecialchars($row['username'])) . '</strong> </a>, 
							<a <i class="fa fa-calendar text-dark font-weight-normal"> ' . date('Y.m.d H:i', strtotime($row['postDate'])) . '</a>
				            </p>
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