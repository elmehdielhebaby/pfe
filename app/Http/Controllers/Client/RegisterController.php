<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use App\Models\Client;
use App\Models\Rendez_vous;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    public function show(){
        $user_id=Request('user_id');
        // echo "$user_id";
        return view('reservation.register',['user_id'=>$user_id,'etablissement_id' => Request('etablissement_id')]);
    }

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [ 
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create()
    {

        // $client= User::create([
        //     'name' => Request('name'),
        //     'email' => Request('email'),
        //     'password' => Hash::make(Request('password')),
        //     'role' => 'client',
        // ]);

        // $lastInsertedId= $client->id;

        // Client::create([
        //     'phone' => Request('phone'),
        //     'client_id' => '250',
        //     'adresse' => Request('adresse'),
        //     'cin' => Request('cin'),
        //     'age' => Request('age'),
        //     'user_id' => $lastInsertedId,
        // ]);


        // $client = DB::table('clients')->where('client_id','like','%'.Auth::user()->id.'%')->first();  
        // $etablissement = DB::table('etablissements')->where('user_id','like','%'.$client->user_id.'%')->first();
        // $rendez_vous= Rendez_vous::all();
        // $client_user_table= User::find($client->client_id);
        // if($client!=null)
        //     return view('reservation.landing',['client'=> $client,'etablissement'=> $etablissement,'rendez_vouss'=>$rendez_vous,'client_user_table'=>$client_user_table]);
        // else
        //     return view('welcome');
        // }
        // return redirect('home');
    }
    
}
