<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Affichage article</title>
        <link rel="stylesheet" href="/trinity/view/css/style.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
	</head>
	<body  ng-app="myApp">
		<header class="title">Title</header>
        <section class="content">

			<?php
			if (isset($_GET['id'])){
				$id = $_GET['id'];
				echo $id;
				?>
			<?php
			} else { ?>
				<ul class="grid" ng-controller="activitiesCtrlAll">
					<li class="card" ng-repeat="activity in activities">
						<a href="activities.php?id={{activity.id_activity}}">
							<header>
								<div class="tile-title">{{activity.lastName}}</div>
							</header>
							<article>
								<span class="tile-description">{{activity.description}}</span>
							</article>
							<footer>
								<div class="date"><span class="tile-nextDate">{{activity.dateActivity}}</span></div>
								<div class="price"><span class="tile-price">{{activity.prix}} €</span></div>
							</footer>
								

						</a>
					</li>
				</ul>
			<?php
			}?>
        </section>

	</body>
    <script type="text/javascript" src="/trinity/view/js/app.js"></script>
</html>