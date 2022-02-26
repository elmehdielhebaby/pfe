<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {   
        if(Auth::user()->role =='admin'){
            $list_user= User::all();
            return view('users.index',['list' => $list_user]);
        }

        if(Auth::user()->role =='client'){
            $client = DB::table('clients')->where('client_id','like','%'.Auth::user()->id.'%')->first();  
            $etablissement = DB::table('etablissements')->where('user_id','like','%'.$client->user_id.'%')->first();
            if($client!=null)
                return view('reservation.profile',['client'=> $client,'etablissement'=> $etablissement]);
            else
                return view('welcome');
        }
        
        return view('dashboard');
    }
}
