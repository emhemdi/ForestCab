@extends('layouts.dashboard')
@section('page_heading',trans('forestCab.Add').trans('forestCab.promo'))
@section('section')
            
   <form role="form" method="post" action="/promos/store">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
            <div class="form-group input-group">
                <span class="input-group-addon">{{trans('forestCab.Name')}}</span>
                <input type="text" name="name" class="form-control" placeholder="" >
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon">{{trans('forestCab.description')}}</span>
                <input type="text" name="promo_description" class="form-control" placeholder="">
            </div>
            <div class="form-group input-group date" id="start_date">
                <span class="input-group-addon">{{trans('forestCab.Startdate')}}</span>
                <input type="text"  name="start_date" class="form-control" 
                 placeholder="" > 
                 <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <div class="form-group input-group date" id="end_date">
                <span class="input-group-addon">{{trans('forestCab.Enddate')}}</span>
                <input type="text" name="end_date" class="form-control" placeholder="" >
                <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon">{{trans('forestCab.Percent')}}</span>
                <input type="text" name="percent" class="form-control" placeholder="" >
            </div>
            <div class="form-group input-group">
                <button type="submit" class="btn btn-default">{{trans('forestCab.Create')}}</button>
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