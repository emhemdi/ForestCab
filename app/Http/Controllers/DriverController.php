<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseException;
use Parse\ParseAnalytics;
use Parse\ParseFile;
use Parse\ParseCloud;
use Parse\ParseClient;

class DriverController extends Controller {

	/**m:
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$query = new ParseQuery("Driver");
		$drivers = $query->find();
		return view('driver/index' , compact('drivers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		return view('driver/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response	
	 */
	public function store(Request $request)
	{
		try
		{

			 $this->validate($request, [
			 	'phone' => 'required',
			 	'email' => 'required|email',
			 	'number' => 'required'
		    ]);
			$driver=new ParseObject("Driver");
			$driver->set("phone",$request->get('phone'));
			$driver->set("name",$request->get('name'));
			$driver->set("email",$request->get('email'));
			$driver->save();
		}
		catch(ParseException $ex)
		{

	 	}
	 	return back();
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
		$drivers = new ParseQuery("Driver");
		$driver = $drivers->get($id);
		return view('driver/edit', compact('driver'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		try
		{
			$this->validate($request, [
			 	'phone' => 'required',
			 	'email' => 'required|email',
			 	'number' => 'required'
		    ]);
			$drivers = new ParseQuery("Driver");
			$driver = $drivers->get($request->input('id'));
			$driver->set("phone",$request->get('phone'));
			$driver->set("name",$request->get('name'));
			$driver->set("email",$request->get('email'));
			$driver->save();


		}
		catch(ParseException $ex)
		{


 		}
 		
 		return back();

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{
			$drivers = new ParseQuery("Driver");
			$driver = $drivers->get($id);
			$driver->destroy();
		}
		catch(ParseException $ex){
		}
		return back();
	}

}
