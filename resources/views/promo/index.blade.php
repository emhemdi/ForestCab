@extends('layouts.dashboard')
@section('page_heading',trans('forestCab.Promos'))
@section('section')
     <a href="{{ url ('/promos/create') }}"><i class="fa fa-plus-square-o fa-fw"></i>{{trans('forestCab.Create')}}</a>      
  	@section ('cotable_panel_title',trans('forestCab.Promo'))
		@section ('cotable_panel_body')
		
			<table class="table table-bordered">
				<thead>
					<tr>
						
						<th>{{trans('forestCab.Name')}}</th>
						<th>{{trans('forestCab.Description')}}</th>
						<th>{{trans('forestCab.Startdate')}}</th>
						<th>{{trans('forestCab.Enddate')}}</th>
						<th>{{trans('forestCab.Percent')}}</th>
						

					</tr>
				</thead>
				<tbody>
					@foreach ($promos as $promo)
					<tr>
						<td>{{$promo->get('name')}}</td>
						<td>{{$promo->get('promo_description')}}</td>
						<td>{{date_format($promo->get('start_date'), 'd-m-Y H:i:s')}}</td>
						<td>{{date_format($promo->get('end_date'), 'd-m-Y H:i:s')}}</td>
						<td>{{$promo->get('percent')}}</td>
						<td>
						
						
						    <a href="{{ url ('/promos/'.$promo->getObjectId().'/edit') }}"> <i class="fa  fa-edit fa-fw"></i> {{trans('forestCab.Update')}}</a>
						    <a href="{{ url ('/promos/'.$promo->getObjectId().'/delete') }}"> <i class="fa   fa-times fa-fw"></i> {{trans('forestCab.Delete')}}</a>
							
							
						</td>
						
					</tr>
					@endforeach
				</tbody>
			</table>
			
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))      
            
@stop
