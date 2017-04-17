<?php
require "header.php"; 

if (!isset($_SESSION['id'])) {
	header('Location: index.php');
}

require '..\modele\PDO\SPDO.php';
use modele\PDO\SPDO;
?>

<?php
if (isset($_GET['id_picture'])){ // Only ONE picture of the activity
	$id_picture = $_GET['id_picture'];?>
	<article class="presentation" ng-controller="pictureCtrl" ng-init="init('<?php echo $id_picture; ?>')">
		<div class="picture-presentation"><img src="{{picture.path}}" alt=""></div>
		<br>
		<div class="author_like">
			<div class="author">
				<p>Uploaded by : {{picture.firstName}} {{picture.lastName}} ({{picture.email}})</p>
				<p>Date : {{picture.datePictureActivity}}</p>
			</div>
			<div class="like">
				<?php if (!SPDO::getInstance()->hasVote($id_picture, $_SESSION['id'])){?>
					<form action="../controller/Pictures_Controller.php" method="POST">
						<input type="text" name="action" value="vote" class="display-none">
						<input type="text" name="idPct" value="<?php echo $id_picture; ?>" class="display-none">
						<label for="btn_vote">
							<input type="submit" id="btn_vote" class="display-none">
							<span>Click here to like</span>
						</label>
					</form>
				<?php } else { ?>
					<p>You like that !<p> 
				<?php }?>
				<p>{{picture.likes}} {{likeText}}</p>
			</div>
		</div>
		Post a new comment :
		<form action="../controller/Pictures_Controller.php" method="POST">
			<input type="text" name="action" value="comment" class="display-none">
			<input type="text" name="idPct" value="<?php echo $id_picture; ?>" class="display-none">
			<textarea name="content" cols="50" rows="10"></textarea>
			<input type="submit" name="btn" value="Post">
		</form>
		<ul class="commentsList">
			<li class="comment" ng-repeat="comment in comments">
				{{comment.content}} Posted by {{comment.firstName}} {{comment.lastName}} at {{comment.dateComment}}
			</li>
		</ul>
	</article>
<?php
} else {
	header("Location: activities.php");
}?>

<?php
require "footer.php";
?>