<?php
session_start(); 
if (!isset($_SESSION['id']) && isset($_GET['id_activity'])) {
			header('Location: activities.php');
}

if (isset($_SESSION['power']) && $_SESSION['power']==1){
	$power = 1;
} else {
	$power = 0;
}

include "header.php"; 


require '..\modele\PDO\SPDO.php';
use modele\PDO\SPDO;
?>
	<?php
	if (isset($_GET['id_activity'])){
		

		$id_activity = $_GET['id_activity'];
		// Present only ONE activity
		?>

		<div ng-controller="activityCtrl" ng-init="init('<?php echo $id_activity; ?>')">

		<article class="presentation">
			{{activity.title}}
			<br>
			{{activity.description}}
		</article>

		<br>

		<div class="post-picture">
			<form method="post" action="../controller/Pictures_Controller.php" enctype="multipart/form-data">
				Post a new picture (max 1 Mo): 
				<input type="text" name="action" value="newPct" class="display-none">
				<input type="text" name="idAct" value="<?php echo $id_activity; ?>" class="display-none">

				<input type="hidden" name="MAX_FILE_SIZE" value="1048576">
				<input type="file" name="imagePost" accept="image/*" required>
				<input type="submit" name="" value="Post this picture">
			</form>
		</div>
		

		<ul class="grid" ng-controller="picturesCtrl" ng-init="init('<?php echo $id_activity; ?>')">
			<li class="picture" ng-repeat="picture in pictures">
				<a href="pictures.php?id_picture={{picture.id_picture_activity}}">
					<img src="{{picture.path}}" alt="{{picture.id_picture_activity}}">

				</a>
			</li>
		</ul>

		<?php 

		/** SUBSCRIBE **/
		if (SPDO::getInstance()->isSubscribed(array($_SESSION['id'], $_GET['id_activity']))) {
			?>
				<form method="POST" action="../controller/Activity_Controller.php">
					<input type="text" name="id_picture_subscribe" style="display: none;" value="<?php echo $_GET['id_activity']; ?>">
					<input type="text" name="id_user" style="display: none;" value="<?php echo $_SESSION['id']; ?>">
					<input type="submit" name="subscribe" value="Subscribe">
				</form>
			<?php
		}
		else{
			?>

				<div>
					<a>You're subscribed to this activities.</a><br>
					<a>Do you want to cancel this action ?</a>

					<form method="POST" action="../controller/Activity_Controller.php">
						<input type="text" name="id_picture_subscribe" style="display: none;" value="<?php echo $_GET['id_activity']; ?>">
						<input type="text" name="id_user" style="display: none;" value="<?php echo $_SESSION['id']; ?>">
					<input type="submit" name="cancel_subscribe" value="cancel">
				</form>
				</div>

			<?php
		}

		/** VOTE **/

		if ((int) SPDO::getInstance()->voteEnable($_GET['id_activity'])[0]) {
			if (empty(SPDO::getInstance()->alreadyVoted(array($_SESSION['id'],$_GET['id_activity'])))) {

				?>
					<form action="../controller/Activity_Vote_Controller.php" method="POST">
						<input style="display: none;" type="number" name="id_user" value="<?php echo $_SESSION['id']; ?>">
						<input style="display: none;" type="number" name="id_activity" value="<?php echo $_GET['id_activity'];//id ?>">
						<input type="date" name="date" min="{{activity.dateLess}}" max="{{activity.dateMore}}" value="{{activity.date}}">
						<input type="time" name="time" min="{{activity.hourLess}}" max="{{activity.hourMore}}" value="{{activity.hour}}">
						<input type="submit" name="vote" value="votez">
					</form>
				<?php
			}
			else{

				?>
					<form action="../controller/Activity_Vote_Controller.php" method="POST">
						<input style="display: none;" type="number" name="id_user" value="<?php echo $_SESSION['id']; ?>">
						<input style="display: none;" type="number" name="id_activity" value="<?php echo $_GET['id_activity'];//id ?>">
						<input type="submit" name="unvote" value="unvote">
					</form>
				<?php
			}
		}
		else{
		} ?>
		</div>
		<?php



	} else { // List of ALL activities
	?>
		<div ng-controller="activitiesCtrl" ng-init="init('<?php echo $power; ?>')"> 
			<div class="options"> Oder by :
				<select name="order" ng-model="sort.model">
					<option ng-repeat="option in sort.options" value="{{option.value}}">{{option.display}}</option>
				</select>
				<input id="check-old" type="checkbox" name="" ng-model="onlyOld"><label for="check-old">Only activities incomming</label>
				<input type="text" class="research-field" ng-model="searchField.title" value="" placeholder="Search">
			</div>
			<ul class="grid">
				<li class="card" ng-repeat="activity in activities | orderBy:sort.model | filter: searchField:strict | limitTo: 8" ng-show="isVisible(activity.passed)">
					<a href="activities.php?id_activity={{activity.id_activity}}">
						<div class="tile-header">
							<div class="tile-title">{{activity.title}}</div>
						</div>
						<div class="tile-mainPart">
							<span class="tile-description">{{activity.description}}</span>
						</div>
						<div class="tile-footer">
							<div class="date">
								<span class="tile-nextDate">{{activity.date}}</span>
								<span class="tile-hour">{{activity.hour}}</span>
							</div>
							<div class="price"><span class="tile-price">{{activity.prix}} €</span></div>
							<?php if($power == 1) { ?>
								<div class="nbSub"><span class="tile-nbSub">{{activity.nbSub}} {{activity.subText}}</span></div>
							<?php } ?>
						</div>
							

					</a>
				</li>
			</ul>
		</div>
	<?php
	}?>

<?php
require "footer.php";
?>