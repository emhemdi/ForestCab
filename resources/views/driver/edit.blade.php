@extends('layouts.dashboard')
@section('page_heading',trans('forestCab.Edit').trans('forestCab.driver'))
@section('section')
           
   <form role="form" method="post" action="/drivers/update">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{$driver->getObjectId()}}">
        <div class="form-group input-group">
            <span class="input-group-addon">{{trans('forestCab.Name')}}</span>
            <input type="text" name="name" class="form-control" placeholder="" value="{{$driver->get('name')}}">
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon">{{trans('forestCab.Phone')}} </span>
            <input type="text" name="phone" class="form-control" placeholder="" value="{{$driver->get('phone')}}">
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon">{{trans('forestCab.Email')}} </span>
            <input type="text" name="email" class="form-control" placeholder="" value="{{$driver->get('email')}}">
        </div>
        <div class="form-group input-group">
            <button type="submit" class="btn btn-default">{{trans('forestCab.Update')}}</button>
        </div>
            
    </form>        
           
@stop