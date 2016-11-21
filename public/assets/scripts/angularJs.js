var app = angular.module('ForestCab', ['ui.bootstrap.datetimepicker'])
        .constant('API_URL', 'http://localhost:8000/');
app.controller('carController', function($scope, $http, API_URL) {
    $http.get(API_URL + "cars")
            .success(function(response) {
                $scope.cars = response;
            });
   
});
app.controller('reservationController', function($scope, $http, API_URL) {
    $http.get(API_URL + "reservations")
            .success(function(response) {
                 $scope.reservations = response;
                for(var i=0;i<$scope.reservations.length;i++) {
                  $scope.reservations[i].range = angular.fromJson( $scope.reservations[i].range);
                  $scope.reservations[i].user = angular.fromJson( $scope.reservations[i].user);
                  $scope.reservations[i].driver = angular.fromJson( $scope.reservations[i].driver);
                }
               
            });
    
    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.reservation = null;
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Ajout Nouvelle Resrvation";
                $http.get(API_URL + 'reservations/create')
                        .success(function(response) {
                            console.log(response);
                            $scope.ranges = response.ranges;

                            $scope.users = response.users;

                            $scope.drivers = response.drivers;
                        });
                break;
            case 'edit':
                $scope.form_title = "Détails Reservation";
                $scope.id = id;
                $http.get(API_URL + 'reservations/' + id +'/edit')
                        .success(function(response) {
                            console.log(response);
                            response.reservation.range = angular.fromJson( response.reservation.range);
                            response.reservation.user = angular.fromJson( response.reservation.user);
                            response.reservation.driver = angular.fromJson( response.reservation.driver);
                            response.from_adr =  angular.fromJson( response.reservation.from_adr);
                            response.to_adr =  angular.fromJson( response.reservation.to_adr);
                            $scope.reservation = response.reservation;

                            $scope.ranges = response.ranges;

                            $scope.users = response.users;

                            $scope.drivers = response.drivers;


                        });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }

    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + "reservations";
        $scope.ranges = $scope.ranges.objectId;

        $scope.users = $scope.users.objectId;
        $scope.drivers = $scope.drivers.objectId;

        if (modalstate === 'edit'){
            url += "/" + id;
        }
        else {
            url+="/store";
        }
        
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.reservation),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            //location.reload();
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    }

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'reservations/' + id
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


        /* Bindable functions
     -----------------------------------------------*/
    $scope.endDateBeforeRender = endDateBeforeRender
    $scope.endDateOnSetTime = endDateOnSetTime
    $scope.startDateBeforeRender = startDateBeforeRender
    $scope.startDateOnSetTime = startDateOnSetTime

    function startDateOnSetTime () {
      $scope.$broadcast('start-date-changed');
    }

    function endDateOnSetTime () {
      $scope.$broadcast('end-date-changed');
    }

    function startDateBeforeRender ($dates) {
      if ($scope.dateRangeEnd) {
        var activeDate = moment($scope.dateRangeEnd);

        $dates.filter(function (date) {
          return date.localDateValue() >= activeDate.valueOf()
        }).forEach(function (date) {
          date.selectable = false;
        })
      }
    }

    function endDateBeforeRender ($view, $dates) {
      if ($scope.dateRangeStart) {
        var activeDate = moment($scope.dateRangeStart).subtract(1, $view).add(1, 'minute');

        $dates.filter(function (date) {
          return date.localDateValue() <= activeDate.valueOf()
        }).forEach(function (date) {
          date.selectable = false;
        })
      }
    }
});
//# sourceMappingURL=angularJs.js.map
