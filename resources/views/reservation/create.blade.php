@extends ('layouts.dashboard')
@section('page_heading', trans('forestCab.Add').trans('forestCab.reservation'))
@section('section')

<div class="col-lg-6">
        <form role="form" method="POST" action="/reservations/store">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label>Gamme</label>
                <select name="range" class="form-control">
                     <option selected disabled>selectionner une gamme</option>
                     @foreach($ranges as $range)
                     <option value="{{ $range->getObjectId() }}">{{ $range->name }}</option>
                     @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Utilisateur</label>
               <select name="user" class="form-control">
                     <option selected disabled>selectionner un utilisateur</option>
                     @foreach($users as $user)
                     <option value="{{ $user->getObjectId() }}">{{ $user->username }}</option>
                     @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Chauffeur</label>
               <select name="driver" class="form-control">
                     <option selected disabled>selectionner un chauffeur</option>
                     @foreach($drivers as $driver)
                     <option value="{{ $driver->getObjectId() }}">{{ $driver->name }}</option>
                     @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="periode_reservation" name="periode_reservation" value="mise a disposition">Mise à disposition
                    </label>
                </div>
            
            <div class="form-group input-group date"  id="start_date">
                <span class="input-group-addon">{{trans('forestCab.Startdate')}}</span>
                <input type="text"  name="start_date" class="form-control" placeholder="" > 
                 <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <div class="form-group input-group date" id="end_date">
                <span class="input-group-addon">{{trans('forestCab.Enddate')}}</span>
                <input type="text" name="end_date" class="form-control" placeholder=""  >
                <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
			
            <div class="form-group">
                <label>{{trans('forestCab.from_adr')}}</label>
               <input id="autocomplete_from_adr" type="adress" name="from_adr" class="form-control" >
            </div>
            <div class="form-group">
                <label>{{trans('forestCab.to_adr')}}</label>
               <input id="autocomplete_to_adr" type="adress" name="to_adr" class="form-control">
            </div>

            <div class="form-group">
                <label>{{trans('forestCab.Price')}}</label>
               <input type="price" name="price" class="form-control" readonly>
            </div>

            <button type="submit" class="btn btn-default">{{trans('forestCab.Add')}}</button>
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

    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlYE05bT9nZhSa20LL8my5B4jizyA3cGU&signed_in=true&libraries=places&callback=initAutocomplete"
        async defer></script>
    <script type="text/javascript">
        // this function disable user from submiting with enter button
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
              event.preventDefault();
              return false;
            }
          });

        $(function () 
        {
            $('#start_date,#end_date').datetimepicker({
                    format: 'MM-DD-YYYY HH:00'
                });

        });

       $("#periode_reservation").click(function() {
            // this function will get executed every time the #home element is clicked (or tab-spacebar changed)
            if($(this).is(":checked")) // "this" refers to the element that fired the event
            {
                $('#').show('#end_date');
                $('#autocomplete_to_adr').hide();
            }
            else {
                $('#autocomplete_to_adr').show();
                $('#end_date').hide();   
            }
        });

         // This example displays an address form, using the autocomplete feature
        // of the Google Places API to help users fill in the information.

        var placeSearch, autocomplete_from_adr,autocomplete_to_adr;

        function initAutocomplete() {
          // Create the autocomplete object, restricting the search to geographical
          // location types.
          autocomplete_from_adr = new google.maps.places.Autocomplete(
              /** @type {!HTMLInputElement} */(document.getElementById('autocomplete_from_adr')),
              {types: ['geocode']});
          autocomplete_to_adr = new google.maps.places.Autocomplete(
              /** @type {!HTMLInputElement} */(document.getElementById('autocomplete_to_adr')),
              {types: ['geocode']});
        }

    </script> 

@stop