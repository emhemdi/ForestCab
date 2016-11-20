@extends('layouts.dashboard')
@section('page_heading',trans('forestCab.GDR'))
@section('section')

    
      <div class="content" ng-app="ForestCab" ng-controller="reservationController">
        <table class="table table-bordered">
            <thead>
               <tr>
                    <th>Gamme</th>
                    <th>Client</th>
                    <th>Chauffeur</th>
                    <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Ajout Nouvelle Resrvation</button></th>
                </tr>
            </thead>
            <tbody>
              <tr ng-repeat="reservation in reservations">
                <td>@{{ reservation.range.name }}</td>
                <td>@{{ reservation.user.username }}</td>
                <td>@{{ reservation.driver.name }}</td>
                <td>
                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', reservation.objectId)">Modifier</button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(reservation.objectId)">Supprimer</button>
                    
                </td>
              </tr>
         </tbody>           
        </table>
     


        <!-- Modal (Pop up when detail button clicked) -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">@{{form_title}}</h4>
                        </div>
                        <div class="modal-body">
                            <form name="frmReservations" class="form-horizontal" novalidate="">

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Gamme</label>
                                    <div class="col-sm-9">
                                        <select ng-model="reservation.range"  ng-init="reservation.range = reservation.range.objectId" ng-options="item.name for item in ranges track by item.objectId" class="form-control has-error" name="range" g-required="true">
                                          <option value="?" selected disabled>selectionner une gamme</option>
                                        </select>
                                       
                                        <span class="help-inline" 
                                        ng-show="frmReservations.range.$invalid && frmReservations.range.$touched">Gamme obligatoire</span>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Client</label>
                                    <div class="col-sm-9">
                                          <select ng-model="reservation.user"  ng-init="reservation.user = reservation.user.objectId" ng-options="item.username for item in users track by item.objectId"  class="form-control has-error" name="user" g-required="true">
                                          <option value="?" selected disabled>selectionner un client</option>
                                          </select>
                                        <span class="help-inline" 
                                        ng-show="frmReservations.user.$invalid && frmReservations.user.$touched">Client obligatoire</span>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Chauffeur</label>
                                    <div class="col-sm-9">
                                       <select ng-model="reservation.driver"  ng-init="reservation.driver = reservation.driver.objectId" ng-options="item.name for item in drivers track by item.objectId"  class="form-control has-error" name="driver" g-required="true">
                                          <option value="?" selected disabled>selectionner un chauffeur</option>
                                          </select>
                                        <span class="help-inline" 
                                        ng-show="frmReservations.driver.$invalid && frmReservations.driver.$touched">chauffeur obligatoire</span>
                                    </div>
                                </div>

                            
                              <div class="form-group error" class="checkbox">
                                  <div  class="col-sm-3 control-label">
                                   
                                   </div>
                                  <label for="periode_reservation" class="col-sm-9">
                                  <input ng-model="reservation.isPeriode"  type="checkbox" id="periode_reservation" name="periode_reservation" aria-label="Toggle ngShow"> 
                                  Mise à disposition</label>
                      
                              </div>
                          
                              <div class=" error dropdown form-group">
                                  <label for="inputEmail3" class="col-sm-3 control-label">Start Date</label>
                                  <a class="col-sm-9 dropdown-toggle" id="dropdownStart" role="button" data-toggle="dropdown" data-target="#"
                                     href="#">
                                      <div class="input-group date">
                                          <input ng-model="reservation.start_date" type="text" class="form-control"  name="start_date">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                      </div>
                                  </a>
                                                       
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                      <datetimepicker data-ng-model="reservation.start_date"
                                                      data-datetimepicker-config="{ dropdownSelector: '#dropdownStart', renderOn: 'end-date-changed' , minView:'hour',
                                                      modelType:'YYYY-MM-DD HH:00'}"
                                                      data-on-set-time="startDateOnSetTime()"
                                                      data-before-render="startDateBeforeRender($dates)"></datetimepicker>

                                  </ul>

                              </div>  
                              <div ng-show="reservation.isPeriode"  id="end_date_content" class="dropdown form-group">
                                  <label  for="inputEmail3" class="col-sm-3 control-label">End Date</label>
                                  <a class="col-sm-9 dropdown-toggle" id="dropdownEnd" role="button" data-toggle="dropdown" data-target="#"
                                     href="#">
                                      <div class="input-group date">
                                          <input ng-model="reservation.end_date" type="text" class="form-control"  name="end_date">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                      </div>
                                  </a>
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                      <datetimepicker data-ng-model="reservation.end_date"
                                                      data-datetimepicker-config="{ dropdownSelector: '#dropdownEnd', renderOn: 'start-date-changed' , minView:'hour',
                                                      modelType: 'YYYY-MM-DD HH:00'}"
                                                      data-on-set-time="endDateOnSetTime()"
                                                      data-before-render="endDateBeforeRender($view, $dates, $leftDate, $upDate, $rightDate)"></datetimepicker>
                                  </ul>
                              </div>
                              
                              <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-3 control-label">{{trans('forestCab.from_adr')}}</label>
                                  <div class="col-sm-9 dropdown-toggle">
                                 <input ng-model="reservation.from_adr" id="autocomplete_from_adr" type="adress" name="from_adr" class="form-control">
                                 </div>
                              </div>
                              <div ng-hide="reservation.isPeriode" class="form-group" id="to_adr_content">
                                  <label for="inputEmail3" class="col-sm-3 control-label">{{trans('forestCab.to_adr')}}</label>
                                 <div class="col-sm-9 dropdown-toggle">
                                    <input ng-model="reservation.to_adr"  id="autocomplete_to_adr" type="adress" name="to_adr" class="form-control">
                                 </div>   
                              </div>

                              <div  id="to_adr_content" class="form-group">
                                  <label for="inputEmail3" class="col-sm-3 control-label">{{trans('forestCab.Price')}}</label>
                                  <div class="col-sm-9">
                                   <div class="input-group">
                                    <div class="input-group-addon">£</div>
                                    <input ng-model="reservation.price" type="text" class="form-control " name="price" id="price" placeholder="Prix" readonly>
                                  </div>
                                  </div>

                              </div>
                          
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmReservations.$invalid">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>



        </div>

     
        <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
       <script type="text/javascript" src="{{ URL::to('assets/scripts/angular.min.js') }}"></script>
      <script type="text/javascript" src="{{ URL::to('assets/scripts/angularJs.js') }}"></script>
       <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlYE05bT9nZhSa20LL8my5B4jizyA3cGU&signed_in=true&libraries=places&callback=initAutocomplete"
        async defer></script>
      <script type="text/javascript">
      
       
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
       
    

  
    
