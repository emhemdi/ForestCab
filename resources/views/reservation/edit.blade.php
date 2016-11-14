@extends ('layouts.dashboard')
@section('page_heading', "Update reservation")
@section('section')
<div class="col-lg-6">
        <form role="form" method="POST" action="/adress/store">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label>Gamme</label>
                <input name="range" class="form-control">
            </div>
            <div class="form-group">
                <label>Utilisateur</label>
               <input name="user" class="form-control">
            </div>
            <div class="form-group">
                <label>Date</label>
               <input name="date" class="form-control">
            </div>
            <div class="form-group">
                <label>Date de debut</label>
               <input name="start_date" class="form-control">
            </div>
            <div class="form-group">
                <label>Date de fin</label>
               <input name="end_date" class="form-control">
            </div>
            <div class="form-group">
                <label>Adresse de départ</label>
               <input name="from_adr" class="form-control">
            </div>
            <div class="form-group">
                <label>Adresse d'arrivée</label>
               <input name="to_adr" class="form-control">
            </div>

            <div class="form-group">
                <label>Prix</label>
               <input name="price" class="form-control">
            </div>

            <button type="submit" class="btn btn-default">Validez</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </form>
    </div>
    
@stop