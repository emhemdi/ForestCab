@extends('layouts.dashboard')
@section('page_heading',trans('forestCab.LU'))
@section('section')
     <a href="{{ url ('/users/create') }}"><i class="fa fa-plus-square-o fa-fw"></i>{{trans('forestCab.Create')}}</a>      
  	@section ('cotable_panel_title',trans('forestCab.User'))
		@section ('cotable_panel_body')
		
			<table class="table table-bordered">
				<thead>
					<tr>
						
						<th>{{trans('forestCab.Name')}}</th>
						<th>{{trans('forestCab.Email')}}</th>
						<th>{{trans('forestCab.Phone')}}</th>
						

					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
					<tr>
						<td>{{$user->get('username')}}</td>
						<td>{{$user->get('email')}}</td>
						<td>{{$user->get('number')}}</td>
						<td> <a href="{{ url ('/users/'.$user->getObjectId().'/delete') }}"> <i class="fa   fa-times fa-fw"></i> {{trans('forestCab.Delete')}}</a></td>
						
					</tr>
					@endforeach
				</tbody>
			</table>
			
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))      
            
@stop
