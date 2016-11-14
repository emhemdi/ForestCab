@extends('layouts.dashboard')
@section('page_heading',trans('forestCab.Edit').trans('forestCab.promo'))
@section('section')
           
   <form role="form" method="post" action="/promos/update">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{$promo->getObjectId()}}">
            <div class="form-group input-group">
                <span class="input-group-addon">{{trans('forestCab.Name')}}</span>
                <input type="text" name="name" class="form-control" placeholder="" value="{{$promo->get('name')}}">
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon">{{trans('forestCab.Description')}}</span>
                <input type="text" name="promo_description" class="form-control" placeholder="" value="{{$promo->get('promo_description')}}">
            </div>
            <div class="form-group input-group date" id="start_date">
                <span class="input-group-addon">{{trans('forestCab.Startdate')}}</span>
                <input type="text"  name="start_date" class="form-control" 
                 placeholder="" value="{{date_format($promo->get('start_date'), 'd-m-Y H:i:s')}}" > 
                 <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <div class="form-group input-group date" id="end_date">
                <span class="input-group-addon">{{trans('forestCab.Enddate')}}</span>
                <input type="text" name="end_date" class="form-control" placeholder=""  value="{{date_format($promo->get('end_date'), 'd-m-Y H:i:s')}}">
                <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon">{{trans('forestCab.Percent')}}</span>
                <input type="text" name="percent" class="form-control" placeholder="" value="{{$promo->get('percent')}}">
            </div>
            <div class="form-group input-group">
                <button type="submit" class="btn btn-default">{{trans('forestCab.Update')}}</button>
            </div>
            
        </form>        
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () 
        {
            $('#start_date,#end_date').datetimepicker({
                    format: 'MM-DD-YYYY HH:00'
                });
            

        });
    </script>         
           
@stop