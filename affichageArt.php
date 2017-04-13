<!DOCTYPE HTML>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>Affichage article</title>
        <link rel="stylesheet" href="view/css/style.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    </head>

    <body ng-app="myApp">
        <header>Title</header>

        <section class="content">
            <ul class="grid" ng-controller="activitiesCtrl">
                <li class="card" ng-repeat="activity in activities">
                    <p>{{activity.lastName}}</p>
                </li>
            </ul>
        </section>
    </body>

    <script type="text/javascript" src="view/js/app.js"></script>
</html>