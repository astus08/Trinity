<!DOCTYPE HTML>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>Affichage article</title>
        <link rel="stylesheet" href="view/css/style.css" />
    </head>

    <body ng-app="myApp">
        <header>Title</header>

        <section class="content">
            <ul class="grid" ng-controller="articleCtrl">
                <li class="card"></li>
                <li class="card"></li>
                <li class="card"></li>
                <li class="card"></li>
                <li class="card"></li>
                <li class="card"></li>
                <li class="card"></li>
                <li class="card"></li>
            </ul>
        </section>
    </body>

    <script type="text/javascript" src="js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
</html>