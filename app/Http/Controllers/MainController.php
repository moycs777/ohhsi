<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
use Redirect;
use Session;
use Validator;
use Illuminate\Support\Facades\Input;

class MainController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('login');
    // }

    public function login(Request $request) {
		
		$rules = array (

				'username' => 'required',
				'password' => 'required'
		);
		$validator = Validator::make ( Input::all (), $rules );
		if ($validator->fails ()) {
			return Redirect::back ()->withErrors ( $validator, 'login' )->withInput ();
		} else {
			if (Auth::attempt ( array (

					'name' => $request->get ( 'username' ),
					'password' => $request->get ( 'password' )
			) )) {
				session ( [

						'name' => $request->get ( 'username' )
				] );
				return Redirect::back ();
			} else {
				Session::flash ( 'message', "Invalid Credentials , Please try again." );
				return Redirect::back ();
			}
		}
	}
	public function register(Request $request) {
		//dd($request->all());
	/*	$rules = array (
				'email' => 'required|unique:users|email',
				'name' => 'required|unique:users|alpha_num|min:4',
				'lastname' => 'required|unique:users|alpha_num|min:4',
				'estado' => 'required|min:1',
				'password' => 'required|min:6|confirmed'
		);
		$validator = Validator::make ( Input::all (), $rules );
		if ($validator->fails ()) {
			return Redirect::back ()->withErrors ( $validator, 'register' )->withInput ();
		} else {*/
			//dd($request->all());
			$user = new User ();
			$user->name = $request->get ( 'name' );
			$user->lastname = $request->get ( 'lastname' );
			$user->email = $request->get ( 'email' );
			$user->password = Hash::make ( $request->get ( 'password' ) );
			$user->estado = 'A'/*$request->get ( 'estado' )*/;
			$user->remember_token = $request->get ( '_token' );

			$user->save ();
			//dd($user);
			return redirect('/users');
			//return Redirect::back ();
		
	}
	public function logout() {
		if (Auth::guard('cliente')->check()){
			Session::flush ();
			Auth::logout ();
	   		return redirect('/clientelogin');	
		}
		Session::flush ();
		Auth::logout ();
   		return redirect('/login');
		//return Redirect::back ('');
	}
}
