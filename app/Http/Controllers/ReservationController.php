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
		  $reservations = $query->find();
		  //dd($reservations);
		  return view('reservation/index',compact('reservations'));
		} catch (ParseException $ex) {
		   throw new Exception('Failed to retrive list reservation, with error message: ' + $ex->getMessage());
		   
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
		  	$drivers =  $query->find();
		  	$ranges = $query1->find();
		  	$users = $query2->find();
		  	$data = array('drivers' => $drivers,
		  								'users' => $users,
		  								'ranges' => $ranges );
			return view('reservation/create', compact('data'));
		} catch (ParseException $ex) {
		   throw new Exception('Failed to load drivers, with error message: ' + $ex->getMessage());
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
		    ]);
            
			$fromAdr = new ParseObject("Adress");
			$fromAdr->set("name",$request->get("from_adr"));
			$fromAdr->save();

			

			$reservation = ParseObject::create("Reservation");
			$reservation->set("range",new ParseObject('Range',$request->get("range")));
			$reservation->set("driver",new ParseObject('Driver',$request->get("driver")));
			//$reservation->set("user",$request->get("user"));
			/*if( $request->get('date') != NULL )
			{	
				$date = date_create_from_format('d-m-Y H:i', $request->get('date'));
				$reservation->set("date",$date);
			}*/
			$reservation->set("start_date", date_create_from_format('d-m-Y H:i', $request->get('start_date')));
			if($request->get("periode_reservation") != NULL) {
				$reservation->set("end_date", date_create_from_format('d-m-Y H:i', $request->get('end_date')));
			}
			else
			{
				$toAdr = new ParseObject("Adress");
				$toAdr->set("name",$request->get("to_adr"));
				$toAdr->save();
				$reservation->set("to_adr",$toAdr);
			}
			$reservation->set("from_adr",$fromAdr);
			
			//$reservation->set("promos",$request->get("promos"));
			
			$reservation->save();
			return redirect('/reservations/');
		} catch (ParseException $ex) {
			dd($ex);
		   throw new Exception('Failed to create new reservation, with error message: ' + $ex->getMessage());
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
		return view('reservation/edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		$query = new ParseQuery("Reservation");
		try {
			
			$start_date = date_create_from_format('d-m-Y H:i', $request->get('start_date'));
            $end_date = date_create_from_format('d-m-Y H:i', $request->get('end_date'));
		  	$reservation = ParseObject::create("Reservation");
			$reservation->set("range",$request->get("range"));
			//$reservation->set("user",$request->get("user"));
			$reservation->set("date",$request->get("date"));
			$reservation->set("start_date",$start_date);
			$reservation->set("end_date",$end_date);
			$reservation->set("from_adr",$request->get("from_adr"));
			$reservation->set("to_adr",$request->get("to_adr"));
			$reservation->set("price",$request->get("price"));
			//$reservation->set("promos",$request->get("promos"));
			
			$reservation->save();
		} catch (ParseException $ex) {
		   throw new Exception('Failed to update reservation, with error message: ' + $ex->getMessage());
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
		   throw new Exception('Failed to delete reservation, with error message: ' + $ex->getMessage());
		}
		return back();
	}

}
