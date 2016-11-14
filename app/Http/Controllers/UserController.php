<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseException;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		try
		{
			$query = new ParseQuery("_User");
			$users = $query->find();

			return view('user/index',compact('users'));
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
		
			return view('user/create');
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
			 	'username' => 'required',
			 	'email' => 'required|email',
			 	'number' => 'required'
		    ]);
			
			$user=ParseObject::create("_User");
			$user->set("username",$request->get('username'));
			$user->set("email",$request->get('email'));
			$user->set("number",(int)$request->get('number'));
			$user->save();
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
	public function destroy($id)
	{
		try
		{
			$query = new ParseQuery("_User");
			$user = $query->get($id);
			$user->destroy();
		}
		catch(ParseException $ex){
		}
		return back();
	}

}
