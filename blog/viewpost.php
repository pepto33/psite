<?php include('../blog/includes/bheader.php');

$stmt = $db->prepare('SELECT * FROM blog_posts bp, blog_members bm WHERE bp.memberID = bm.memberID AND bp.postID = :postID');
$stmt->execute(array(':postID' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if ($row['postID'] == '') {
    header('Location: ./');
    exit;
}

?>
<br>
<br>
<br>
<br>

<div id="wrapper">
    <div class="panel panel-primary">
        <?php
        echo '<div class="container">
        <div class="row">
            <div class="col-lg-8">
              <div class="panel-heading">
                <h1><a href="">' . $row['postTitle'] . '</a></h1>
                <p class=""><i class="fa fa-user"></i> от ' . $row['username'] . '</p>
                <p><i class="fa fa-calendar"></i> опубликовано ' . date('Y-m-d H:i:s', strtotime($row['postDate'])) . ' в ' . date('h:i A', strtotime($row['postDate'])) . '</p>
                </div>  
					
                <hr>
                <img src="admin/' . $row['thumbnail'] . '" class="thumbnail img-responsive">
                <hr>
                <div contenteditable="true">' . $row['postCont'] . '</div>
                <br>
            </div>
        </div>';
        ?>
    </div>

</div>

<?php include('includes/bfooter.php') ?>