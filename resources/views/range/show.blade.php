@extends('layouts.dashboard')
@section('page_heading',trans('forestCab.Show').trans('forestCab.range'))
@section('section')
        
  

        <div class="form-group input-group">
            <span class="input-group-addon">{{trans('forestCab.Name')}}</span>
            <input type="text" name="name" class="form-control" placeholder="" value="{{$range->get('name')}}" disabled>
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon">{{trans('forestCab.Description')}} </span>
            <input type="text" name="range_description" class="form-control" placeholder="" value="{{$range->get('range_description')}}" disabled>
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon">{{trans('forestCab.Price')}}</span>
            <input type="text" name="price" class="form-control" placeholder="" value="{{$range->get('price')}}" disabled>
            </div>
       
        <div class="form-group col-sm-6">
           @section ('panel1_panel_title', trans('forestCab.Options'))
           @section ('panel1_panel_body')
            @foreach ($options as $option)
            <div class="checkbox">
                <label>
                    <input type="checkbox"  name="options_list[]" value="{{$option->getObjectId()}}"  disabled
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
        
               
           

           
@stop