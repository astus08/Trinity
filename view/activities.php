<?php
require "header.php"; 
?>

	<?php
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		?>
		<article class="presentation" ng-controller="activityCtrl" ng-init="init('<?php echo $id; ?>')">
			{{activity.lastName}}
			{{activity.id_activity}}
			<br>
			<form action="pictures.php">
				<input type="text" name="id_activity" value={{activity.id_activity}} class="display-none">

				<label for="btn_pict" class="button_picture">
					<input type="submit" id="btn_pict" class="display-none">
					<span>Display the pictures</span>
				</label>
			</form>
		</article>
	<?php
	} else { ?>
		<ul class="grid" ng-controller="activitiesCtrl">
			<li class="card" ng-repeat="activity in activities">
				<a href="activities.php?id={{activity.id_activity}}">
					<div class="tile-header">
						<div class="tile-title">{{activity.lastName}}</div>
					</div>
					<div class="tile-mainPart">
						<span class="tile-description">{{activity.description}}</span>
					</div>
					<div class="tile-footer">
						<div class="date"><span class="tile-nextDate">{{activity.dateActivity}}</span></div>
						<div class="price"><span class="tile-price">{{activity.prix}} €</span></div>
					</div>
						

				</a>
			</li>
		</ul>
	<?php
	}?>

<?php
require "footer.php";
?>