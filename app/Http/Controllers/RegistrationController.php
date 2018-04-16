<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class RegistrationController extends Controller
{
    
	public function create(){

		return view('registration.create');

	}

	public function store(){

		//validate the from

		$this->validate(request(), [

			'name' => 'required',

			'email' => 'required|email',

			'password' => 'required|confirmed'

		]);


		//create and save user

		$user = User::create(request(['name', 'email', 'password']));

		//sign then in

		auth()->login($user);


		//redirect to homeapage

		return redirect()->home();



	}


}
