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

class RangeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		try
		{
			$query = new ParseQuery("Range");
			$ranges = $query->find();

			return view('range/index',compact('ranges'));
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
		try
		{
			$query = new ParseQuery("Option");
			$options = $query->find();
			$query = new ParseQuery("Car");
			$cars = $query->find();
		return view('range/create' , compact('options','cars'));
			
		}
		catch(ParseException $ex)
		{

	 	}

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
			 	'name' => 'required',
			 	'range_description' => 'required',
		    ]);
			
			$range=ParseObject::create("Range");
			$range->set("name",$request->get('name'));
			$range->set("range_description",$request->get('range_description'));
			$range->set("price",(int)$request->get('price'));
			if(!empty($request->get("options_list")))
			{
				$queryOptions=new ParseQuery("Option");
				$option=$queryOptions->containedIn("objectId", $request->get("options_list"));
				$range->setArray("options",$queryOptions->find());
			}
			if(!empty($request->get("cars_list")))
			{
				$queryCars=new ParseQuery("Car");
				$car=$queryCars->containedIn("objectId", $request->get("cars_list"));
				$range->setArray("cars",$queryCars->find());
			}
			
			
			
			$range->save();
			
		}
		catch(ParseException $ex)
		{
			echo $ex;

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
		try
		{
			$ranges = new ParseQuery("Range");
			$range = $ranges->get($id);
			$query = new ParseQuery("Option");
			$options = $query->find();
			$ops=$range->get('options');
			//dd($range->get('options')[0]->getObjectId());
			$query = new ParseQuery("Car");
			$cars = $query->find();
			return view('range/show', compact('range','options','cars','ops'));
		}
	catch(ParseException $ex)
		{


	 	}
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
			$this->validate($request, [
			 	'name' => 'required',
			 	'range_description' => 'required',
		    ]);
			$ranges = new ParseQuery("Range");
			$range = $ranges->get($id);
			$query = new ParseQuery("Option");
			$options = $query->find();
			$ops=$range->get('options');
			//dd($range->get('options')[0]->getObjectId());
			$query = new ParseQuery("Car");
			$cars = $query->find();
			return view('range/edit', compact('range','options','cars','ops'));
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
			$ranges = new ParseQuery("Range");
			$range = $ranges->get($request->get('id'));
			$range->set("name",$request->get('name'));
			$range->set("range_description",$request->get('range_description'));
			$range->set("price",(int)$request->get('price'));
			if(!empty($request->get("options_list")))
			{
				$queryOptions=new ParseQuery("Option");
				$option=$queryOptions->containedIn("objectId", $request->get("options_list"));
				$range->setArray("options",$queryOptions->find());
			}
			if(!empty($request->get("cars_list")))
			{
				$queryCars=new ParseQuery("Car");
				$car=$queryCars->containedIn("objectId", $request->get("cars_list"));
				$range->setArray("cars",$queryCars->find());
			}
			
			$range->save();
		}
		catch(ParseException $ex)
		{
			echo $ex;


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
			$ranges = new ParseQuery("Range");
			$range = $ranges->get($id);
			$range->destroy();
		}
		catch(ParseException $ex){
		}
		return back();
	}

}
