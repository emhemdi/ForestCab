@extends('layouts.dashboard')
@section('page_heading',trans('forestCab.Edit').trans('forestCab.range'))
@section('section')
        
   <form role="form" method="post" action="/ranges/update">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{$range->getObjectId()}}">

        <div class="form-group input-group">
            <span class="input-group-addon">{{trans('forestCab.Name')}}</span>
            <input type="text" name="name" class="form-control" placeholder=""  value="{{$range->get('name')}}"> 
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon">{{trans('forestCab.Description')}} </span>
            <input type="text" name="range_description" class="form-control" placeholder="" value="{{$range->get('range_description')}}">
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon">{{trans('forestCab.Price')}}</span>
            <input type="text" name="price" class="form-control" placeholder="" value="{{$range->get('price')}}">
            </div>
       
        <div class="form-group col-sm-6">
           @section ('panel1_panel_title', trans('forestCab.Options'))
           @section ('panel1_panel_body')
            @foreach ($options as $option)
            <div class="checkbox">
                <label>
                    <input type="checkbox"  name="options_list[]" value="{{$option->getObjectId()}}" 
                    @foreach($ops as $op)
                    @if($op->getObjectId()==$option->getObjectId())
                    {{'checked="checked"'}}
                    @endif   
                    @endforeach
                     >
                    {{$option->get('name')}} 
                </label>
            </div>
            @endforeach
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'panel1'))
        </div>
        <!--
        <div class="form-group col-sm-6">
             @section ('panel2_panel_title', trans('forestCab.Cars'))
           @section ('panel2_panel_body')
            @foreach ($cars as $car)
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="cars_list[]" value="{{$car->getObjectId()}}">{{$car->get('model')}}
                </label>
            </div>
            @endforeach
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'panel2'))
        </div>
        -->
         <div class="form-group input-group col-sm-12">
            <button type="submit" class="btn btn-default">{{trans('forestCab.Update')}}</button>
        </div>    
        </form>        
           

           
@stop