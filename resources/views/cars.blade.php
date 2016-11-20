

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->
<script type="text/javascript" src="{{ URL::to('assets/scripts/angularJs.js') }}"></script>
 
 
<div ng-app="ForestCab" ng-controller="reservationController">

First Name: <input type="text" ng-model="firstName"><br>
Last Name: <input type="text" ng-model="lastName"><br>
<br>
Full Name: @{{test}}

</div>

