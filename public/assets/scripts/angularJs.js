var app = angular.module('ForestCab', [])
        .constant('API_URL', 'http://localhost:8000/');
app.controller('carController', function($scope, $http, API_URL) {
    $http.get(API_URL + "cars")
            .success(function(response) {
            	
            	//alert(response[0].objectId);
                $scope.cars = response;
                
            });
    //show modal form         
   $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New cars";
                break;
            case 'edit':
                $scope.form_title = "Employee Detail";
                $scope.id = id;
                $http.get(API_URL + 'cars/' + id)
                        .success(function(response) {
                            console.log(response);
                            $scope.car = response;
                        });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
}
//save new record / update existing record
    $scope.save = function(modalstate, id)
     {
        var url = API_URL + "cars";
        
        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }
        
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.car),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    }
  	//delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this car?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'cars/' + id
            }).
                    success(function(data) {
                        console.log(data);
                        location.reload();
                    }).
                    error(function(data) {
                        console.log(data);
                        alert('Unable to delete');
                    });
        } else {
            return false;
        }
    }
});
//# sourceMappingURL=angularJs.js.map
