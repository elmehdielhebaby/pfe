<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Models\User;
use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(string $url)
    {   

        // if(Auth::user()->role =='admin'){
        //     $list_user= User::all();
        //     return view('users.index',['list' => $list_user]);
        // }
        // $list_user= User::all();

        // $etablissement=Etablissement::find($url);
        // $search=$_GET[$url];
        $etablissement = DB::table('etablissements')->where('url','like','%'.$url.'%')->first();
        $user = DB::table('users')->where('id','like','%'.$etablissement->user_id.'%')->first();

        return view('reservation.index',['etablissement'=> $etablissement],['user'=> $user]);
        // return view('lol.index',['url'=> $url]);

        
    }
}
