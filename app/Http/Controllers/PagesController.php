<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

use App\CompraCliente;
use App\CompraClienteDetalle;
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Validator;
use Response;
use Redirect;
use Session;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$serie = [4,10,1,3,4,9,8];
    	$est = [4,10,1,3,4,9,8];

    	return view('admin.estadisticas')
    		->with('serie', $serie)
    		->with('est', $est);
    }
}
