<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth:cliente');
    }
    public function index(){
        //return "Hola usuarios y visitantes de todas partes";
        //return view('pages.partials.blog');
        return view('pages.blog');
    }

}
