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

class PromoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		try
		{
			$query = new ParseQuery("Promo");
			$promos = $query->find();
			return view('promo/index',compact('promos'));
		}
	catch(ParseException $ex)
		{


	 	}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('promo/create');
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
			 	'start_date' => 'required',
			 	'end_date' => 'required',
			 	'name' => 'required',
			 	'promo_description' => 'required',
			 	'percent' => 'required|integer'
		    ]);

			$start_date = date_create_from_format('d-m-Y H:i', $request->get('start_date'));
			$end_date = date_create_from_format('d-m-Y H:i', $request->get('end_date'));
			$promo=new ParseObject("Promo");
			$promo->set("start_date",$start_date);
			$promo->set("name",$request->get('name'));
			$promo->set("promo_description",$request->get('promo_description'));
			$promo->set("end_date",$end_date);
			$promo->set("percent",(int)$request->get('percent'));
			$promo->save();
			
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
		try
		{
			$promos = new ParseQuery("Promo");
			$promo = $promos->get($id);
			return view('promo/edit', compact('promo'));
		}
	catch(ParseException $ex)
		{


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
		try
		{
			$this->validate($request, [
			 	'start_date' => 'required',
			 	'end_date' => 'required',
			 	'name' => 'required',
			 	'promo_description' => 'required',
			 	'percent' => 'required|integer'
		    ]);
			$start_date = date_create_from_format('d-m-Y H:i', $request->get('start_date'));
			$end_date = date_create_from_format('d-m-Y H:i', $request->get('end_date'));
			$promos = new ParseQuery("Promo");
			$promo = $promos->get($request->get('id'));
			$promo->set("start_date",$start_date);
			$promo->set("name",$request->get('name'));
			$promo->set("promo_description",$request->get('promo_description'));
			$promo->set("end_date",$end_date);
			$promo->set("percent",(int)$request->get('percent'));
			$promo->save();
			
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
			$promos = new ParseQuery("Promo");
			$promo = $promos->get($id);
			$promo->destroy();
			
		}
		catch(ParseException $ex)
		{
		}
		return back();
	}


}
