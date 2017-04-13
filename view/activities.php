

<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Affichage article</title>
        <link rel="stylesheet" href="/trinity/view/css/style.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
	</head>
	<body  ng-app="myApp">
		<header>Title</header>
        <section class="content">

			<?php
			if (isset($idArticle)){
				// ctrl->article(id)
				?>

				<?php
			} else { ?>
			salut
				<ul class="grid" ng-controller="activitiesCtrl">
					<li class="card" ng-repeat="activity in activities">{{activity.lastName}}
					</li>
				</ul>
			<?php
			}?>
        </section>

		<form method="POST" action="Activity_Controller.php">
			<input type="text" name="test">
			<input type="submit" name="btn">
		</form>

	</body>
    <script type="text/javascript" src="/trinity/view/js/app.js"></script>
</html>