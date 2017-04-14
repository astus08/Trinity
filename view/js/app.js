var myApp = angular.module('myApp',[]);

myApp.controller('activitiesCtrl', ['$scope', '$http', function ($scope, $http) {
    $http.get('/trinity/controller/Activity_Controller.php?action=all').success(function (data) {
        $scope.activities = data;
        console.log($scope.activities);
    });
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
            console.log($scope.activities);
        });
    };
}]);

myApp.controller('pictureCtrl', ['$scope', '$http', function ($scope, $http) {
    $scope.init = function (id_picture) {
        $http.get('/trinity/controller/Pictures_Controller.php?id_picture=' + id_picture).success(function (data) {
            $scope.picture = data[0];
            console.log(data);
        });
    };
}]);