<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Etablissement;
use App\Models\Rendez_vous;
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
        $users= User::all();
        $etablissements= Etablissement::all();
        return view('admin.index',['users' => $users,'etablissements'=>$etablissements]);
        }

        if(Auth::user()->role =='client'){
            $client = DB::table('clients')->where('client_id','like','%'.Auth::user()->id.'%')->first();  
            $etablissement = DB::table('etablissements')->where('user_id','like','%'.$client->user_id.'%')->first();
            $rendez_vous= Rendez_vous::all();
            if($client!=null)
                return view('reservation.landing',['client'=> $client,'etablissement'=> $etablissement,'rendez_vouss'=>$rendez_vous]);
            else
                return view('welcome');
            }
            
        if(Auth::user()->role =='user'){
            $id=Auth::user()->id;
            $etablissement=DB::table('etablissements')->where('user_id','like','%'.Auth::user()->id.'%')->first();
            $users=User::all();
            $clients= Client::all();
            $rendez_vous= Rendez_vous::all();
            return view('dashboard',['clients'=> $clients,'etablissement'=> $etablissement,'users'=>$users,'rendez_vouss'=>$rendez_vous]);
        }
    }
}
