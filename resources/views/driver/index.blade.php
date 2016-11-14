@extends('layouts.dashboard')
@section('page_heading',trans('forestCab.Drivers'))
@section('section')
     <a href="{{ url ('/drivers/create') }}"><i class="fa fa-plus-square-o fa-fw"></i>{{trans('forestCab.Create')}}</a>      
  	@section ('cotable_panel_title',trans('forestCab.Driver'))
		@section ('cotable_panel_body')
		
			<table class="table table-bordered">
				<thead>
					<tr>
						
						<th>{{trans('forestCab.Name')}}</th>
						<th>{{trans('forestCab.Phone')}}</th>
						<th>{{trans('forestCab.Email')}}</th>
						

					</tr>
				</thead>
				<tbody>
					@foreach ($drivers as $driver)
					<tr>
						<td>{{$driver->get('name')}}</td>
						<td>{{$driver->get('phone')}}</td>
						<td>{{$driver->get('email')}}</td>
						<td>
						
						
						    <a href="{{ url ('/drivers/'.$driver->getObjectId().'/edit') }}"> <i class="fa  fa-edit fa-fw"></i> {{trans('forestCab.Update')}}</a>
						    <a href="{{ url ('/drivers/'.$driver->getObjectId().'/delete') }}"> <i class="fa   fa-times fa-fw"></i> {{trans('forestCab.Delete')}}</a>
							
							
						</td>
						
					</tr>
					@endforeach
				</tbody>
			</table>	
			
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))      
            
@stop
