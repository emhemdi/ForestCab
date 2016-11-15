@extends('layouts.dashboard')
@section('page_heading',trans('forestCab.Cars'))
@section('section')
<div ng-app="ForestCab" ng-controller="carController">
     <a href="{{ url ('/cars/create') }}"><i class="fa fa-plus-square-o fa-fw"></i>{{trans('forestCab.Create')}}</a>      
  	@section ('cotable_panel_title',trans('forestCab.Car'))
		@section ('cotable_panel_body')
		
			<table class="table table-bordered" >
				<thead>
					<tr>
						
						<th>{{trans('forestCab.Model')}}</th>
						<th>{{trans('forestCab.Description')}}</th>
						

					</tr>
				</thead>
				<tbody >
					<tr ng-repeat="car in cars">
                        <td>@{{  car.model }}</td>
                        <td>@{{ car.car_description }}</td>
                       
                        <td>
                            <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', car.objectId)">Edit</button>
                            <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(car.objectId)">Delete</button>
                        </td>
                    </tr>
				</tbody>
			</table>	
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))      
            
@stop
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->
<script type="text/javascript" src="{{ URL::to('assets/scripts/angularJs.js') }}"></script>
