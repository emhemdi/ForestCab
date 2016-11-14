@extends('layouts.dashboard')
@section('page_heading',trans('forestCab.Add').trans('forestCab.car'))
@section('section')
           
   <form role="form" method="get" action="/cars/store">
        
            <div class="form-group input-group">
                <span class="input-group-addon">{{trans('forestCab.Model')}}</span>
                <input type="text" name="model" class="form-control" placeholder="" >
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon">{{trans('forestCab.Description')}}</span>
                <input type="text" name="car_description" class="form-control" placeholder="">
            </div>
            <div class="form-group input-group">
                <button type="submit" class="btn btn-default">{{trans('forestCab.Create')}}</button>
            </div>
            
        </form>        
           
@stop