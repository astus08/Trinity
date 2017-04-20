var myApp = angular.module('myApp',[]);

myApp.controller('activitiesCtrl', ['$scope', '$http', function ($scope, $http) {
    $scope.sort = {
        model:   null,
        options: [
            {value: 'prix' , display: "Price"},
            {value: '-prix', display: "Price (-)"},
            {value: 'dateJS', display: "Date"},
            {value: '-dateJS', display: "Date (-)"},
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
            element["dateJS"] = new Date(Date.UTC(t[0], t[1] - 1, t[2], t[3], t[4], t[5]));
            element["passed"] = element["date"] < Date.now();
            element["prix"] = parseInt(element["prix"]);

            element["subText"] = element["nbSub"] > 1 ? "subs" : "sub";
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
                
                var t = $scope.activity["dateActivity"].split(/[-: ]/);
                var date = new Date(t[0], t[1]-1, t[2]);
                $scope.activity["date"] = date.getFullYear() + "-" + date.getMonth() + "-" + date.getDate();

                var dateMore = new Date(t[0], t[1] - 1, t[2]);
                dateMore.setDate(dateMore.getDate() + 3);
                $scope.activity["dateMore"] = dateMore.getFullYear() + "-" + dateMore.getMonth() + "-" + dateMore.getDate();

                var dateLess = new Date(t[0], t[1] - 1, t[2]);
                dateLess.setDate(dateLess.getDate() - 3);
                $scope.activity["dateLess"] = dateLess.getFullYear() + "-" + dateLess.getMonth() + "-" + dateLess.getDate();


                var hour = new Date(t[0], t[1] - 1, t[2], t[3], t[4], t[5]);
                $scope.activity["hour"] = hour.getHours() + ":" + hour.getMinutes() + ":" + hour.getSeconds();

                var hourMore = new Date(t[0], t[1] - 1, t[2], t[3], t[4], t[5]);
                hourMore.setHours(hourMore.getHours() + 3);
                $scope.activity["hourMore"] = hourMore.getHours() + ":" + hourMore.getMinutes() + ":" + hourMore.getSeconds();

                var hourLess = new Date(t[0], t[1] - 1, t[2], t[3], t[4], t[5]);
                hourLess.setHours(hourLess.getHours() - 3);
                $scope.activity["hourLess"] = hourLess.getHours() + ":" + hourLess.getMinutes() + ":" + hourLess.getSeconds();



                // $scope.activity["date"] = t[0];
                // $scope.activity["date+3"] = t[0] + 3;
                // $scope.activity["date-3"] = t[0] + 3;

                // $scope.activity["hour"] = t[1];

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