<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsAdminController extends Controller
{
    
    public function crear(){
    	//return "crear post";
        return view('admin.crear_post');
    }
  
}
