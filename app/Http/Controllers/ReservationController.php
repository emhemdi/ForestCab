<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Parse\ParseQuery;
use Parse\ParseException;
use Parse\ParseObject;
use Parse\ParseUser;
use DateTime;
use Carbon\Carbon;
class ReservationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 */


	public function index()
	{
		$query = new ParseQuery("Reservation");
		try {
			$query->includeKey("driver");
			$query->includeKey("range");
			$query->includeKey("user");
		  	$data = $query->find();
		  	foreach ($data as $reservation) { 
		  		$reservations[] =json_decode($reservation->_encode());
		  	}
		  	return $reservations;
		  //return view('reservation/index',compact('reservations'));
		} catch (ParseException $ex) {
			echo($ex);
			return back();
		}
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 * @return Response
	 */
	public function create()
	{
		$query = new ParseQuery("Driver");
		$query1 = new ParseQuery("Range");
		$query2 = new ParseQuery("_User");;
		try {
		  	$driversdata =  $query->find();
		  	$rangesdata = $query1->find();
		  	$usersdata = $query2->find();
		  	foreach ($driversdata as $driver) { 
		  		$drivers[] =json_decode($driver->_encode());
		  	}
		  	foreach ($rangesdata as $range) { 
		  		$ranges[] =json_decode($range->_encode());
		  	}
		  	foreach ($usersdata as $user) { 
		  		$users[] =json_decode($user->_encode());
		  	}
			//return view('reservation/create',compact('users','drivers','ranges'));
			return compact('users','drivers','ranges');
		} catch (ParseException $ex) {
			echo($ex);
			return back();
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		try {
			 $regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";

			 $this->validate($request, [
			 	'from_adr' => 'required',
			 	'start_date' => 'required',
			 	'driver' => 'required',
			 	'user' => 'required',
			 	'range' => 'required'
		    ]);
            
			$reservation = ParseObject::create("Reservation");
			$reservation->set("range",new ParseObject('Range',$request->get("range.objectId")));
			//$reservation->set("driver",new ParseObject('Driver',$request->get("driver")));
			//$reservation->set("user",new ParseObject('_User',$request->get("user")));
			
			$reservation->set("start_date", date_create_from_format('d-m-Y H:i', $request->get('start_date')));
			if($request->get("periode_reservation") != NULL) {
				$reservation->set("end_date", date_create_from_format('d-m-Y H:i', $request->get('end_date')));
				$reservation->set("isPeriode",true);
			}
			else
			{
				$toAdr = new ParseObject("Adress");
				$toAdr->set("name",$request->get("to_adr"));
				$toAdr->save();
				$reservation->set("to_adr",$toAdr);
				$reservation->set("isPeriode",false);
			}
			$fromAdr = new ParseObject("Adress");
			$fromAdr->set("name",$request->get("from_adr"));
			$fromAdr->save();

			$reservation->set("from_adr",$fromAdr);
			
			//$reservation->set("promos",$request->get("promos"));
			
			return $reservation->save();
		} catch (ParseException $ex) {
			dd($ex);
			return $ex;
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		try {
			$queryReservation = new ParseQuery("Reservation");
			$queryReservation->includeKey("from_adr");
			$queryReservation->includeKey("to_adr");
			//$queryReservation->includeKey("driver");
			//$queryReservation->includeKey("user");
			//$queryReservation->includeKey("range");


			$query = new ParseQuery("Driver");
			$query1 = new ParseQuery("Range");
			$query2 = new ParseQuery("_User");
			$reservation = $queryReservation->get($id);
		  	$driversdata =  $query->find();
		  	$rangesdata = $query1->find();
		  	$usersdata = $query2->find();
		  	$reservation->from_adr = json_decode($reservation->from_adr->_encode());
		  	if ($reservation->to_adr != null) 
		  		$reservation->to_adr = json_decode($reservation->to_adr->_encode());
		  	$reservation = json_decode($reservation->_encode());
		  	foreach ($driversdata as $driver) { 
		  		$drivers[] =json_decode($driver->_encode());
		  	}
		  	foreach ($rangesdata as $range) { 
		  		$ranges[] =json_decode($range->_encode());
		  	}
		  	foreach ($usersdata as $user) { 
		  		$users[] =json_decode($user->_encode());
		  	}
			return compact('reservation','users','drivers','ranges');
		} catch (ParseException $ex) {
			echo($ex);
			return back();
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		try {
			 $regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";

			 $this->validate($request, [
			 	'from_adr' => 'required',
			 	'start_date' => 'required',
			 	'driver' => 'required',
			 	'user' => 'required',
			 	'range' => 'required'
		    ]);
            
			$fromAdr = new ParseObject("Adress");
			$fromAdr->set("name",$request->get("from_adr"));
			$fromAdr->save();

			$query = new ParseQuery("Reservation");
			$reservation = $query->get($request->get("id"));
			$reservation->set("range",new ParseObject('Range',$request->get("range")));
			$reservation->set("driver",new ParseObject('Driver',$request->get("driver")));
			$reservation->set("user",new ParseObject('_User',$request->get("user")));
			
			$reservation->set("start_date", date_create_from_format('d-m-Y H:i', $request->get('start_date')));
			if($request->get("periode_reservation") != NULL) {
				$reservation->set("end_date", date_create_from_format('d-m-Y H:i', $request->get('end_date')));
				$reservation->set("isPeriode",true);
			}
			else
			{
				$toAdr = new ParseObject("Adress");
				$toAdr->set("name",$request->get("to_adr"));
				$toAdr->save();
				$reservation->set("to_adr",$toAdr);
				$reservation->set("isPeriode",false);
			}
			$reservation->set("from_adr",$fromAdr);
			dd($reservation->save());
			return $reservation->save();
			//return redirect('/reservations/');
		} catch (ParseException $ex) {
			dd($ex);
			return back();
		}
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$query = new ParseQuery("Reservation");
		try {
		  	$reservation = $query->get($id);
			$reservation->destroy();
		} catch (ParseException $ex) {
			echo($ex);
			return back();
		}
		return back();
	}

}
