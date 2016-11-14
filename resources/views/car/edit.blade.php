@extends('layouts.dashboard')
@section('page_heading',trans('forestCab.Edit').trans('forestCab.car'))
@section('section')
           
   <form role="form" method="get" action="/cars/update">
            <input type="hidden" name="id" value="{{$car->getObjectId()}}">
            <div class="form-group input-group">
                <span class="input-group-addon">{{trans('forestCab.Model')}}</span>
                <input type="text" name="model" class="form-control" placeholder="" value="{{$car->get('model')}}">
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon">{{trans('forestCab.Description')}}</span>
                <input type="text" name="car_description" class="form-control" placeholder="" value="{{$car->get('car_description')}}">
            </div>
            <div class="form-group input-group">
                <button type="submit" class="btn btn-default">{{trans('forestCab.Update')}}</button>
            </div>
            
        </form>        
           
@stop