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
        $etablissement = DB::table('etablissements')->where('url','like','%'.$url.'%')->first();
        if($etablissement){
                if($etablissement->active==1){
                    $user = DB::table('users')->where('id','like','%'.$etablissement->user_id.'%')->first();
                    return view('reservation.index',['etablissement'=> $etablissement,'user'=> $user]);
            }
            else
                return view('welcome');
        }else
            return view('welcome');
    }
}
