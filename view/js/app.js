var myApp = angular.module('myApp',[]);

myApp.controller('activitiesCtrl', ['$scope', '$http', function($scope,$http) {
   $http.get('/trinity/controller/activitiesCtrl.php&action=all').success(function(data) {
        $scope.activities = data;
        console.log($scope.activities);
    });
}]);