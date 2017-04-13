var myApp = angular.module('myApp',[]);

myApp.controller('activitiesCtrlAll', ['$scope', '$http', function($scope,$http) {
   $http.get('/trinity/controller/Activity_Controller.php?action=all').success(function(data) {
        $scope.activities = data;
        console.log($scope.activities);
    });
}]);