<?php namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Parse\ParseObject;
use Parse\ParseQuery;


class CarController extends Controller {

	/**m:
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id = null)
	{
		if ($id == null)
		{
			$query = new ParseQuery("Car");
			$cars = $query->find();

			//return view('car/index' , compact('cars'));
			//dd($cars);
			//dd(json_encode($cars));
			foreach ($cars as $car) 
			{
    
    			$response[] = json_decode($car->_encode());
			}

		
			return($response);

		}
		else
		{
			$cars = new ParseQuery("Car");
			$car = $cars->get($id);
			return $car->_encode();
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		return view('car/create');
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
			 	'car_description' => 'required',
			 	'model' => 'required'
		    ]);
			$car=new ParseObject("Car");
			$car->set("car_description",$request->get('car_description'));
			$car->set("model",$request->get('model'));
			$car->save();
			 return 'Employee record successfully created';
		}
		catch(ParseException $ex)
		{

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
		$cars = new ParseQuery("Car");
		$car = $cars->get($id);
		return view('car/edit', compact('car'));
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
			 	'car_description' => 'required',
			 	'model' => 'required'
		    ]);
			$cars = new ParseQuery("Car");
			$car = $cars->get($request->get('objectId'));
			$car->set("car_description",$request->get('car_description'));
			$car->set("model",$request->get('model'));
			$car->save();


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
			$cars = new ParseQuery("Car");
			$car = $cars->get($id);
			$car->destroy();
			return "Car successfully deleted ";
		}
		catch(ParseException $ex){
			return "Car not successfully deleted ";
		}
		
	}

}
