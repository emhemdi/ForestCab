@extends('layouts.dashboard')
@section('page_heading',trans('forestCab.Add').trans('forestCab.option'))
@section('section')
           
   <form role="form" method="post" action="/options/store">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group input-group">
            <span class="input-group-addon">{{trans('forestCab.Name')}}</span>
            <input type="text" name="name" class="form-control" placeholder="" >
            </div>
        <div class="form-group input-group">
            <span class="input-group-addon">{{trans('forestCab.Description')}}</span>
            <input type="text" name="option_description" class="form-control" placeholder="">
        </div>
        <div class="form-group input-group">
            <button type="submit" class="btn btn-default">{{trans('forestCab.Create')}}</button>
        </div>
            
    </form>        
           
@stop