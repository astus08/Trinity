<?php
require "header.php"; 
?>

			<?php
			if (isset($_GET['id_picture'])){
				$id_picture = $_GET['id_picture'];?>
				<article class="presentation" ng-controller="activityCtrl" ng-init="init('<?php echo $id_picture; ?>')">
					{{picture.path}}
					<br>
					<input type="button" name="dsplayPictures" value="Display the pictures">
				</article>
			<?php
			} else if (isset($_GET['id_activity'])){ 
                $id_activity = $_GET['id_activity'];?>
				<ul class="grid" ng-controller="picturesCtrl" ng-init="init('<?php echo $id_activity; ?>')">
					<li class="picture" ng-repeat="picture in pictures">
						<a href="pictures.php?id_picture={{picture.id_picture_activity}}">
                            <img src="{{picture.path}}" alt="{{picture.id_picture_activity}}">

						</a>
					</li>
				</ul>
			<?php
			} else {
                header("Location: activities.php");
            }?>

<?php
require "footer.php";
?>