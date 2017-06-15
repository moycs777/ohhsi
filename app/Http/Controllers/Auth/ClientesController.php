<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Cliente;
use Hash;
use Redirect;
//use Socialite;
use Session;
use Validator;
use Illuminate\Support\Facades\Input;    
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\RegistersUsers;

class ClientesController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
      $this->middleware('guest:cliente');
    }

    public function showLoginForm()
    {
      return view('auth.cliente-login');
    }

    public function login( Request $request)
    {
      $messages = [
          'email.exists' => 'Email o clave incorrectos.',
          'password.min' => 'La clave debe contener al menos 6 caracteres',
      ];
      $validator = Validator::make($request->all(), [
            'email' => 'exists:clientes',
            'password' => 'required|min:6',
            ], $messages);

      if ($validator->fails()) {
          return redirect('clientelogin')
            ->withErrors($validator)
            ->withInput();
      }
        
      // $this->validate($request, [
      //   'email'   => 'required|email',
      //   'password' => 'required|min:6'
      // ]);

      // Attempt to log the user in
      //dd(Auth::guard('cliente'));
      //dd($request->password);

      if (Auth::guard('cliente')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        //dd( $request->all());
        return redirect('/home');
        //return redirect()->intended(route('asd'));
      }
      
    }
    public function register(Request $request) {
        //dd($request->all());
        
        $usuario = Cliente::where('email',  $request->email)->first();
        if ( isset($usuario) ) {
            //dd($usuario);
            $messages = [
                'email.exists' => 'Email o clave incorrectos.',
                'password.min' => 'La clave debe contener al menos 6 caracteres',
            ];
            //dd($messages);
            return redirect('clientelogin')
                /*->withErrors($validator)*/
                ->with('messages', $messages)
                ->withErrors($messages)
                ->withInput();
        }
      
          $cliente = new Cliente ();
          $cliente->name = $request->get ( 'name' );
          $cliente->lastname = $request->get ( 'lastname' );
          $cliente->email = $request->get ( 'email' );
          $cliente->password = Hash::make ( $request->get ( 'password' ) );
          //$cliente->estado = 'A'/*$request->get ( 'estado' )*/;
          $cliente->remember_token = $request->get ( '_token' );

          $cliente->save ();
          
          if (Auth::guard('cliente')->attempt(['email' => $cliente->email, 'password' => $request->password], $request->remember)) {
            //dd( $request->all());
            return redirect('/home');
            //return redirect()->intended(route('asd'));
          }
         
          
        
    }

    public function redirectToProvider($provider)
    {
        //dd($provider);
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        //dd( $user = Socialite::driver($provider)->user() );
        try{
            $user = Socialite::driver($provider)->user();
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            abort(403, 'Unauthorized action.');
            return redirect()->to('/');
        }

        if ( $user->getEmail() == null) {
            $attributes = [
                'provider' => $provider,
                'provider_id' => $user->getId(),
                'name' => $user->getName(),            
                'email' => $user->getId(),
                'password' => isset($attributes['password']) ? $attributes['password'] : bcrypt(str_random(16))
     
            ];
        }
        if ($user->getEmail() ) {
            $attributes = [
                'provider' => $provider,
                'provider_id' => $user->getId(),
                'name' => $user->getName(), 
                //email nulo para prbar
                           
                'email' => $user->getId(),
                'password' => $user->getId()
            ];       
        }

        //Revisar si el correo
        //Revisar si el usuario existe
        $clien = Cliente::where('provider_id', $attributes['provider_id'] )->first();
        if ( !$clien ) {
            /*f (Auth::guard('cliente')->attempt(['email' => $attributes['email'], 'password' => $user->getId() ], false)) {
                //dd( $request->all());
                return redirect('/home');
            } */
            
            //dd($attributes['name']);
            $cliente = new Cliente ();
            $cliente->name = $attributes['name'];
            $cliente->lastname = $attributes['name'];
            $cliente->email = $attributes['email'];
            $cliente->provider = $provider;
            $cliente->provider_id = $attributes['provider_id'];
            $cliente->password = Hash::make( $attributes['password'] );
            //$cliente->estado = 'A'/*$request->get ( 'estado' )*/;
            $cliente->remember_token = true;

            $cliente->save ();
        
        }

        //dd($cliente);
        if (Auth::guard('cliente')->attempt(['email' => $attributes['email'], 'password' => $user->getId() ], false)) {
            //dd( $request->all());
            return redirect('/home');
        }        

    }

    /*public function handleProviderCallback($provider)
    {
        //dd(Socialite::driver($provider)->user());
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = Cliente::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id
        ]);
    }*/

    public function logout() {
      $asd =12;
      //dd($asd);
      Session::flush ();
      Auth::logout ();
      // Auth::guard('cliente')->logout ();
      return redirect('/clientelogin');
    }

}

