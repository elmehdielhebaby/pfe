<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Client;
use App\Models\Etablissement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
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
    protected function create(array $data)
    {
        if($data['user']=='user')
        {
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $lastInsertedId= $user->id;
        Etablissement::create([
            'name' => $data['titre'],
            'phone' => $data['phone'],
            'user_id' => $lastInsertedId,
            'categorie' => $data['categorie'],
            'adresse' => $data['adresse'],
            'service' => $data['service'],
            'url' => $data['url'],
            'description' => $data['description']
        ]); 
        return $user;
        }else{
            $user= User::create([
                'name' => Request('name'),
                'email' => Request('email'),
                'password' => Hash::make(Request('password')),
                'role' => 'client',
            ]);
            $lastInsertedId= $user->id;
            Client::create([
                'client_id' => $lastInsertedId,
                'user_id' => Request('user_id'),
                'phone' => Request('phone'),
                'adresse' => Request('adresse'),
                'cin' => Request('cin'),
                'age' => Request('age'),
            ]); 
            return $user;
        }   
    }
}
