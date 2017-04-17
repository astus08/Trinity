var myApp = angular.module('myApp',[]);

myApp.controller('activitiesCtrl', ['$scope', '$http', function ($scope, $http) {
    $scope.sort = {
        model:   null,
        options: [
            {value: 'prix' , display: "Price"},
            {value: '-prix', display: "Price (-)"},
            ]
    };
    $scope.sort.model = $scope.sort.options[0].value;

    $http.get('/trinity/controller/Activity_Controller.php?action=all').success(function (data) {
        $scope.activities = data;
        $scope.activities.forEach(function (element) {
            //Pour savoir si la date est passé ou non
            var t             = element["dateActivity"].split(/[-: ]/);
            element["date"]   = t[2] + "/" + t[1] + "/" + t[0];
            element["hour"]   = t[3] + ":" + t[4];
            element["passed"] = new Date(Date.UTC(t[0], t[1] - 1, t[2], t[3], t[4], t[5])) < Date.now();
            element["prix"] = parseInt(element["prix"]);
        }, this);
        console.log($scope.activities);
    });

    $scope.isVisible = function(passed){
        if (!$scope.onlyOld){
            return true;
        } else {
            return passed;
        }
    }
}]);

myApp.controller('activityCtrl', ['$scope', '$http', function($scope,$http) {
    $scope.init = function(id){
        $http.get('/trinity/controller/Activity_Controller.php?id='+id).success(function(data) {
                $scope.activity = data[0];
                console.log($scope.activity);
        });
    };
}]);

myApp.controller('picturesCtrl', ['$scope', '$http', function ($scope, $http) {
    $scope.init = function (id_activity) {
        $http.get('/trinity/controller/Pictures_Controller.php?id_activity=' + id_activity).success(function (data) {
            $scope.pictures = data;
            console.log($scope.pictures);
        });
    };
}]);

myApp.controller('pictureCtrl', ['$scope', '$http', function ($scope, $http) {
    $scope.init = function (id_picture) {
        $http.get('/trinity/controller/Pictures_Controller.php?id_picture=' + id_picture).success(function (data) {

            console.log(data);

            $scope.picture = data[0];

            console.log("data");
            console.log($scope.picture);

            $scope.comments = data[1];

            console.log("Comments : ");
            console.log($scope.comments);

            $scope.likeText = $scope.picture.likes > 1 ? "likes" : "like";

            $scope.voteText = "Give a vote to this picture";
        });
    };
}]);


myApp.controller('shopCtrl', ['$scope', '$http', function ($scope, $http) {
    $scope.sort = {
        model: null,
        options: [
            { value: 'price', display: "Price" },
            { value: '-price', display: "Price (-)" },
        ]
    };
    $scope.sort.model = $scope.sort.options[0].value;

    $http.get('/trinity/controller/Shop_controller.php?action=all').success(function (data) {
        $scope.products = data;
        $scope.products.forEach(function (element) {
            element["price"] = parseInt(element["price"]);
        }, this);
        console.log($scope.products);
    });
}]);

myApp.controller('articleCtrl', ['$scope', '$http', function ($scope, $http) {
    $scope.init = function (id_article) {
        $http.get('/trinity/controller/Shop_controller.php?id=' + id_article).success(function (data) {
            $scope.product = data[0];
            console.log($scope.product);
        });
    }
}]);