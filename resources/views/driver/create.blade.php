@extends('layouts.dashboard')
@section('page_heading',trans('forestCab.Add').trans('forestCab.driver'))
@section('section')
           
   <form role="form" method="post" action="/drivers/store">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group input-group">
            <span class="input-group-addon">{{trans('forestCab.Name')}}</span>
            <input type="text" name="name" class="form-control" placeholder="" >
         </div>
        <div class="form-group input-group">
            <span class="input-group-addon">{{trans('forestCab.Phone')}}</span>
            <input type="text" name="phone" class="form-control" placeholder="">
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon">{{trans('forestCab.Email')}}</span>
            <input type="text" name="email" class="form-control" placeholder="">
        </div>
        <div class="form-group input-group">
            <button type="submit" class="btn btn-default">{{trans('forestCab.Create')}}</button>
        </div>
            
    </form>        
           
@stop