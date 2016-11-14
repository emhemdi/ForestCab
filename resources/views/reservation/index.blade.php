@extends ('layouts.dashboard')
@section('page_heading', trans('forestCab.GDR'))

@section('section')
<a href="{{ url ('/reservations/create') }}"><i class="fa fa-plus-square-o fa-fw"></i>{{trans('forestCab.Create')}}</a> 

@section ('cotable_panel_title',trans('forestCab.LR'))
    @section ('cotable_panel_body')
        
        <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Gamme</th>
                    <th>Client</th>
                    <th>Chauffeur</th>
                </tr>
            </thead>
            <tbody>
            @foreach($reservations as $reservation) 
                <tr>
                  <td>{{$reservation->get('range') != null ? $reservation->get('range')->get('name'):""}}</td>
                  <td>{{$reservation->get('user') != null ? $reservation->get('user')->get('username'):""}}</td>
                  <td>{{$reservation->get('driver') != null ? $reservation->get('driver')->get('name'):""}}</td>
                  <td>
                  
                  <a href="{{ url ('/reservations/'.$reservation->getObjectId().'/edit') }}"><i class="fa  fa-edit fa-fw"></i>  {{trans('forestCab.Update')}}</a>
                <a href="{{ url ('/reservations/'.$reservation->getObjectId().'/delete') }}"> <i class="fa   fa-times fa-fw"></i> {{trans('forestCab.Delete')}}</a>
              <a href="{{ url ('/reservations/'.$reservation->getObjectId().'/show') }}"> <i class="fa   fa-desktop fa-fw"></i> {{trans('forestCab.Show')}}</a>
              </td>
                </tr>
             @endforeach
             
         </tbody>           
        </table>
        </div>
        
    
    @endsection
    @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
@stop