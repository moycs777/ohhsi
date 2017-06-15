<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class UsersController extends Controller
{
    /**
     * Index show all the users
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
     public function __construct()
     {
         $this->middleware('auth');
     }
      
    public function index()
    {
        $users = User::all();
        
        return view('admin.users.index', compact('users'));
    }

    /**
     * Create a user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a user
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        //esto no esta funcionando
        User::create($request->all());
        return 'succes';
        return $request->all();
    }

    public function modify($id)
    {
        $user = User::find($id);
        //dd($user);
        return view('auth.modify_user')->with('user', $user);
        
    }

    public function updateOrCreate(Request $request, $id)
    {
        //$cliente = Cliente::find($id);

        //dd( $id);
        //dd( $request->all());
        //dd( $cliente->direccion_envio->nombre_contacto);
        $user = User::where('id', '=', $id)
            ->updateOrCreate(
                ['id' => $id], //what we look for
                ['name' => $request->name,
                    'lastname' => $request->lastname,
                    'email' => $request->email,
                    'password' => Hash::make ( $request->get ( 'password' ) ),
                    'estado' => 'A',
                    
                ]//what to update
            );
        
        return redirect()->route('admin.users');
    }
}
