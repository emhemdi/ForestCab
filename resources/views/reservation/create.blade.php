@extends ('layouts.dashboard')
@section('page_heading', "Nouvelle reservation")
@section('section')
<script type="text/javascript">
	$(function() {

        // each calendar picker needs a unique class/id so we can target it
        $(".startdate").datepicker({dateFormat: "yy-mm-dd", minDate: 0});
        $(".enddate").datepicker({dateFormat: "yy-mm-dd", minDate: 0});
    });
</script>
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
            <div class="checkbox form-group">
                <label>
					<input type="checkbox" name="periode_reservation" value="mise a disposition">
                	Mise à disposition
            	</label>
            </div>
            <div class="container">
			    <div class='col-md-4'>
			        <div class="form-group">
			        <label>Date Début</label>
			            <div class='input-group date' id='datetimepicker6'>
			                <input type='text' class="form-control" />
			                <span class="input-group-addon">
			                    <span class="glyphicon glyphicon-calendar"></span>
			                </span>
			            </div>
			        </div>
			    </div>
			    <div class='col-md-4'>
			        <div class="form-group">
			        <label>Date Fin</label>
			            <div class='input-group date' id='datetimepicker7'>
			                <input type='text' class="form-control" />
			                <span class="input-group-addon">
			                    <span class="glyphicon glyphicon-calendar"></span>
			                </span>
			            </div>
			        </div>
			    </div>
			</div>
			<script type="text/javascript">
			    $(function () {
			        $('#datetimepicker6').datetimepicker();
			        $('#datetimepicker7').datetimepicker({
			            useCurrent: false //Important! See issue #1075
			        });
			        $("#datetimepicker6").on("dp.change", function (e) {
			            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
			        });
			        $("#datetimepicker7").on("dp.change", function (e) {
			            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
			        });
			    });
			</script>
            <div class="form-group">
                <label>Adresse de départ</label>
               <input type="adress" name="from_adr" class="form-control">
            </div>
            <div class="form-group">
                <label>Adresse d'arrivée</label>
               <input  type="adress" name="to_adr" class="form-control">
            </div>

            <div class="form-group">
                <label>Prix</label>
               <input type="price" name="price" class="form-control">
            </div>

            <button type="submit" class="btn btn-default">Validez</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </form>
    </div>
    <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>

	<script src="/blog/public/js/datepicker.js"></script>

@stop