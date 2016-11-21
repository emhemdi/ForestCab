app.controller('carController', function($scope, $http, API_URL) {
    $http.get(API_URL + "cars")
            .success(function(response) {
                $scope.cars = response;
            });
   
});