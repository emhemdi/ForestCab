@extends('layouts.dashboard')
@section('page_heading',trans('forestCab.Cars'))
@section('section')

     <a href="{{ url ('/cars/create') }}"><i class="fa fa-plus-square-o fa-fw"></i>{{trans('forestCab.Create')}}</a>      
  	@section ('cotable_panel_title',trans('forestCab.Car'))
		@section ('cotable_panel_body')
		
			<table class="table table-bordered">
				<thead>
					<tr>
						
						<th>{{trans('forestCab.Model')}}</th>
						<th>{{trans('forestCab.Description')}}</th>
						

					</tr>
				</thead>
				<tbody>
					@foreach ($cars as $car)
					<tr>
						<td>{{$car->get('model')}}</td>
						<td>{{$car->get('car_description')}}</td>
						<td>
						
						
						    <a href="{{ url ('/cars/edit/'.$car->getObjectId()) }}"> <i class="fa  fa-edit fa-fw"></i> {{trans('forestCab.Update')}}</a>
						    <a href="{{ url ('/cars/delete/'.$car->getObjectId()) }}"> <i class="fa   fa-times fa-fw"></i> {{trans('forestCab.Delete')}}</a>
							
							
						</td>
						
					</tr>
					@endforeach
				</tbody>
			</table>	
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))      
            
@stop
