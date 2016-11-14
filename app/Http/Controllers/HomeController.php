<?php namespace App\Http\Controllers;
use Parse\ParseObject;
use Parse\ParseQuery;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		try{

		$query = new ParseQuery("Range");
		$rangesCount =count($query->find());
		$query = new ParseQuery("Promo");
		$promosCount =count($query->find());
		$query = new ParseQuery("Option");
		$optionsCount =count($query->find());
		$query = new ParseQuery("Driver");
		$driversCount =count($query->find());
		$query = new ParseQuery("Car");
		$carsCount =count($query->find());
		$query = new ParseQuery("Message");
		$messagesCount =count($query->find());
		$query = new ParseQuery("Reservation");
		$reservationsCount =count($query->find());
		

		return view('home',compact('messagesCount','rangesCount','promosCount','optionsCount','driversCount','carsCount','reservationsCount'));
	}
	catch(ParseException $ex)
		{
			echo($ex);
	 	}
	}

}
