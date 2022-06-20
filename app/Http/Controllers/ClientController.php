<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Rendez_vous;
use App\Models\Etablissement;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\Client  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //    
    }

    public function home()
    {
        $client = Client::find(Auth::user()->id);
        $etablissement = Etablissement::find($client->etablissement_id);
        $today = now();
        $rendez_vous = DB::table('rendez_vouses')->where('date', '>=', $today)->where('client_id', Auth::user()->id)->where('etablissement_id', $etablissement->id)->orderBy('date', 'asc')->get();
        $rendez_vous_history = DB::table('rendez_vouses')->where('date', '<', $today)->where('client_id', Auth::user()->id)->where('etablissement_id', $etablissement->id)->orderBy('date', 'asc')->get();
        if ($client != null)
            return view('reservation.landing', ['client' => $client, 'etablissement' => $etablissement, 'rendez_vouss' => $rendez_vous, 'rendez_vous_history' => $rendez_vous_history]);
        else
            return view('welcome');
    }


    public function register()
    {

        $etablissement = Etablissement::find(Request('etablissement_id'));
        return view('reservation.register', ['etablissement_id' => Request('etablissement_id'), 'url' => $etablissement->url]);
    }


    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string| max:255',
            'email' => 'required| string| email|max:255|unique:clients,email',
            'password' => 'required| string|min:8|confirmed',
            // 'phone' => 'required| phone|min:8|confirmed',
            // 'adresse' => 'required| string|min:8|confirmed',
            // 'cin' => 'required| string|min:8|confirmed',
            // 'age' => 'required| string|min:8|confirmed',
            // 'genre' => 'required| string|min:8|confirmed'
        ]);
        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->etablissement_id  = $request->etablissement_id;
        $client->adresse = $request->adresse;
        $client->cin = $request->cin;
        $client->age = $request->age;
        $client->genre = $request->genre;
        $client->password = Hash::make($request->password);
        $save = $client->save();
        if ($save) {
            return $this->check($request);
        }
    }

    public function login()
    {
        $etablissement = Etablissement::find(Request('etablissement_id'));
        return view('reservation.login', ['etablissement_id' => Request('etablissement_id'), 'url' => $etablissement->url]);
    }

    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required| email | exists:clients,email',
            'password' => 'required| min:8 |max:30'
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('client')->attempt($creds))
            return redirect()->route('client.home');
        else
            return redirect()->route('client.login')->whith('fail', 'erreur');
    }

    public function logout(Request $request)
    {
        Auth::guard('client')->logout();
        return redirect('reservation/' . Request('url'));
    }

    public function edit()
    {
        $client = Auth::user();
        // $client = DB::table('clients')->where('client_id', 'like', '%' . Auth::user()->id . '%')->first();
        $etablissement = Etablissement::find($client->etablissement_id);
        return view('reservation.profile', ['client' => $client, 'etablissement' => $etablissement]);
    }
}
