<?php include('../blog/includes/bheader.php');

$stmt = $db->prepare('SELECT * FROM blog_posts bp, blog_members bm WHERE bp.memberID = bm.memberID AND bp.postID = :postID');
$stmt->execute(array(':postID' => $_GET['id']));
$row = $stmt->fetch();

if ($row['postID'] == '') {
    header('Location: ./');
    exit;
} ?>

<main role="main" class="flex-shrink-0 jumbotron">
    <?php
    echo '<div class="container jumbotron">
        <div class="row">
            <div class="col-lg-8">
              <div class="panel-heading">
                <h1><a  class="text-dark" href="">' . str_replace(PHP_EOL, '<br>', $row['postTitle']) . '</a></h1>
                <p class=""><i class="fa fa-user"></i> от ' . str_replace(PHP_EOL, '<br>', $row['username']) . '</p>
                <p><i class="fa fa-calendar"></i> опубликовано ' . date('Y.m.d H:i', strtotime($row['postDate'])) . '</p>
                </div>  
				
                <hr>
                <img src="admin/' . $row['thumbnail'] . '" class="thumbnail img-fluid img-thumbnail">
                <hr>
                <div contenteditable="true">' . $row['postCont'] . '</div>
                <br>
            </div>
        </div>';
    ?>
</main>
<?php include('includes/bfooter.php') ?>
<!--
   html_entity_decode(htmlspecialchars( nl2br(
-->