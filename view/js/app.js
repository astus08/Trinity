var myApp = angular.module('myApp',[]);

myApp.controller('activitiesCtrl', ['$scope', '$http', function($scope,$http) {
   $http.get('/trinity/controller/Activity_Controller.php?action=all').success(function(data) {
        $scope.activities = data;
        console.log($scope.activities);
    });
}]);

myApp.controller('activityCtrl', ['$scope', '$http', function($scope,$http) {
    $scope.init = function(id){
        $http.get('/trinity/controller/Activity_Controller.php?id='+id).success(function(data) {
                $scope.activity = data
                console.log($scope.activity);
        });
    };
}]);