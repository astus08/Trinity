<?php
require "header.php"; 
?>
	<?php
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		// Present only ONE activity
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
	} else { // List of ALL activities
	?>
		<div ng-controller="activitiesCtrl"> 
			<div class="options"> Oder by :
				<select name="order" ng-model="sort.model">
					<option ng-repeat="option in sort.options" value="{{option.value}}">{{option.display}}</option>
				</select>
				<input id="check-old" type="checkbox" name="" ng-model="onlyOld"><label for="check-old">Only activities incomming</label>
				<input type="text" class="research-field" ng-model="searchField.title" value="" placeholder="Search">
			</div>
			<ul class="grid">
				<li class="card" ng-repeat="activity in activities | orderBy:sort.model | filter: searchField:strict | limitTo: 8" ng-show="isVisible(activity.passed)">
					<a href="activities.php?id={{activity.id_activity}}">
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