@extends('layouts.dashboard')
@section('page_heading',trans('forestCab.Cars'))
@section('section')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js">
<div ng-app="ForestCab" ng-controller="carController">
     <a href="{{ url ('/cars/create') }}"><i class="fa fa-plus-square-o fa-fw"></i>{{trans('forestCab.Create')}}</a>      
  	@section ('cotable_panel_title',trans('forestCab.Car'))
		@section ('cotable_panel_body')
		
			<table  id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						
						<th>{{trans('forestCab.Model')}}</th>
						<th>{{trans('forestCab.Description')}}</th>
						<th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Add New cars</button></th>
                    

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
			<!-- End of Table-to-load-the-data Part -->
            <!-- Modal (Pop up when detail button clicked) -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">@{{form_title}}</h4>
                        </div>
                        <div class="modal-body">
                            <form name="frmcars" class="form-horizontal" novalidate="">

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Model</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="model" name="model" placeholder="Fullmodel" value="@{{car.model}}" 
                                        ng-model="car.model" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmcars.model.$invalid && frmcars.model.$touched">Model field is required</span>
                                    </div>
                                </div>

                                 <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">car_description</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="car_description" name="car_description" placeholder="Fullcar_description" value="@{{car.car_description}}" 
                                        ng-model="car.car_description" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmcars.car_description.$invalid && frmcars.car_description.$touched">Model field is required</span>
                                    </div>
                                </div>

                               

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmcars.$invalid">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        
	
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))      
            
@stop
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->
<script type="text/javascript" src="{{ URL::to('assets/scripts/angularJs.js') }}"></script>
<script type="text/javascript">
	
    $('#example').DataTable();


</script>