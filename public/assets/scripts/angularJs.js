var app = angular.module('ForestCab', [])
        .constant('API_URL', 'http://localhost:8000/');
app.controller('carController', function($scope, $http, API_URL) {
    $http.get(API_URL + "cars")
            .success(function(response) {
            	
            	//alert(response[0].objectId);
                $scope.cars = response;
                
            });
   
});
//# sourceMappingURL=angularJs.js.map
