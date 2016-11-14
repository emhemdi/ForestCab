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

class OptionController extends Controller {

	/**m:
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$query = new ParseQuery("Option");
		$options = $query->find();
		return view('option/index' , compact('options'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		return view('option/create');
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
			$option=new ParseObject("Option");
			$option->set("option_description",$request->get('option_description'));
			$option->set("name",$request->get('name'));
			$option->save();
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
		$options = new ParseQuery("Option");
		$option = $options->get($id);
		return view('option/edit', compact('option'));
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
			$options = new ParseQuery("Option");
			$option = $options->get($request->input('id'));
			$option->set("option_description",$request->input('option_description'));
			$option->set("name",$request->input('name'));
			$option->save();


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
			$options = new ParseQuery("Option");
			$option = $options->get($id);
			$option->destroy();
		}
		catch(ParseException $ex){
		}
		return back();
	}

}
