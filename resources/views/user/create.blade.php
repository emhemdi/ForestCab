@extends('layouts.dashboard')
@section('page_heading',trans('forestCab.Add').trans('forestCab.promo'))
@section('section')
            
   <form role="form" method="post" action="/users/store">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
            <div class="form-group input-group">
                <span class="input-group-addon">{{trans('forestCab.Name')}}</span>
                <input type="text" name="username" class="form-control" placeholder="" >
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon">{{trans('forestCab.Email')}}</span>
                <input type="text" name="email" class="form-control" placeholder="">
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon">{{trans('forestCab.Phone')}}</span>
                <input type="text" name="number" class="form-control" placeholder="">
            </div>
            <div class="form-group input-group">
                <button type="submit" class="btn btn-default">{{trans('forestCab.Create')}}</button>
            </div>
            
        </form>  
        <br>
       <br>
       @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      
@stop