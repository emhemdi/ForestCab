@extends('layouts.dashboard')
@section('page_heading',trans('forestCab.Options'))
@section('section')
     <a href="{{ url ('/options/create') }}"><i class="fa fa-plus-square-o fa-fw"></i>{{trans('forestCab.Create')}}</a>      
  	@section ('cotable_panel_title',trans('forestCab.Option'))
		@section ('cotable_panel_body')
		
			<table class="table table-bordered">
				<thead>
					<tr>
						
						<th>{{trans('forestCab.Name')}}</th>
						<th>{{trans('forestCab.Description')}}</th>
						

					</tr>
				</thead>
				<tbody>
					@foreach ($options as $option)
					<tr>
						<td>{{$option->get('name')}}</td>
						<td>{{$option->get('option_description')}}</td>
						<td>
						
						
						    <a href="{{ url ('/options/'.$option->getObjectId().'/edit') }}"> <i class="fa  fa-edit fa-fw"></i> {{trans('forestCab.Update')}}</a>
						    <a href="{{ url ('/options/'.$option->getObjectId().'/delete') }}"> <i class="fa   fa-times fa-fw"></i> {{trans('forestCab.Delete')}}</a>
							
							
						</td>
						
					</tr>
					@endforeach
				</tbody>
			</table>	
			
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))      
            
@stop
