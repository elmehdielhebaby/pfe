<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

            $client = DB::table('clients')->where('user_id','like','%'.Auth::user()->id.'%')->first();
            // $client = DB::table('users')->where('id','like','%'.$etablissement->user_id.'%')->first();
            return view('reservation.profile',['client'=> $client]);

            // return view('reservation.profile',[]);
        }
        return view('dashboard');
    }
}
