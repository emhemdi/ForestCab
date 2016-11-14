@extends('layouts.dashboard')
@section('page_heading',trans('forestCab.Edit').trans('forestCab.option'))
@section('section')
           
   <form role="form" method="post" action="/options/update">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{$option->getObjectId()}}">
        <div class="form-group input-group">
            <span class="input-group-addon">{{trans('forestCab.Name')}}</span>
            <input type="text" name="name" class="form-control" placeholder="" value="{{$option->get('name')}}">
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon">{{trans('forestCab.Description')}} </span>
            <input type="text" name="option_description" class="form-control" placeholder="" value="{{$option->get('option_description')}}">
        </div>
        <div class="form-group input-group">
            <button type="submit" class="btn btn-default">{{trans('forestCab.Update')}}</button>
        </div>
            
    </form>        
           
@stop