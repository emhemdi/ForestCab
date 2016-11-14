@extends('layouts.dashboard')
@section('page_heading',trans('forestCab.Ranges'))
@section('section')
     <a href="{{ url ('/ranges/create') }}"><i class="fa fa-plus-square-o fa-fw"></i>{{trans('forestCab.Create')}}</a>      
  	@section ('cotable_panel_title',trans('forestCab.Range'))
		@section ('cotable_panel_body')
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						
						<th>{{trans('forestCab.Name')}}</th>
						<th>{{trans('forestCab.Description')}}</th>
						<th>{{trans('forestCab.Price')}}</th>

					</tr>
				</thead>
				<tbody>
					@foreach ($ranges as $range)
					<tr>
						<td>{{$range->get('name')}}</td>
						<td>{{$range->get('range_description')}}</td>
						<td>{{$range->get('price')}}</td>
						<td>
						
						
						    <a href="{{ url ('/ranges/'.$range->getObjectId().'/edit') }}"><i class="fa  fa-edit fa-fw"></i>  {{trans('forestCab.Update')}}</a>
						    <a href="{{ url ('/ranges/'.$range->getObjectId().'/delete') }}"> <i class="fa   fa-times fa-fw"></i> {{trans('forestCab.Delete')}}</a>
							<a href="{{ url ('/ranges/'.$range->getObjectId().'/show') }}"> <i class="fa   fa-desktop fa-fw"></i> {{trans('forestCab.Show')}}</a>
							
						</td>
						
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>	
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))      
            
@stop
