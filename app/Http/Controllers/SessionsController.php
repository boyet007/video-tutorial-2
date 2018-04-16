<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionsController extends Controller
{

	public function __construct(){

		$this->middleware('guest', ['except' => 'create', 'destroy']);

	}
  
  public function create(){

  	return view('sessions.create');



  }

  public function store(){

  	//Attempt to authenticate user

  	if (! auth()->attempt(request(['email', 'password']))){

  		return back()->withErrors([

  			'message' => 'Please check your credentials and try again.'

  		]);

  	}

  	return redirect()->home();



  }

  public function destroy(){

  	echo "test";

  	auth()->logout();

  	return view('/');

  }

}
