<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Rendez_vous;
use App\Models\Etablissement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
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
        // Session::flush();
        if(Auth::user()->role =='admin'){
        $users= User::all();
        $etablissements= Etablissement::all();
        return view('admin.index',['users' => $users,'etablissements'=>$etablissements]);
        }

        if(Auth::user()->role =='client'){
            $client = DB::table('clients')->where('client_id','like','%'.Auth::user()->id.'%')->first();  
            $etablissement = DB::table('etablissements')->where('user_id','like','%'.$client->user_id.'%')->first();
            $rendez_vous= Rendez_vous::all();
            $client_user_table= User::find($client->client_id);
            if($client!=null)
                return view('reservation.landing',['client'=> $client,'etablissement'=> $etablissement,'rendez_vouss'=>$rendez_vous,'client_user_table'=>$client_user_table]);
            else
                return view('welcome');
            }
            
        if(Auth::user()->role =='user'){

            $id=Auth::user()->id;
            $etablissement=DB::table('etablissements')->where('user_id','like','%'.Auth::user()->id.'%')->first();
            $users=User::all();
            $clients= Client::all();
            $rendez_vous= Rendez_vous::all();
            $nbr_client = 0;
            foreach($clients as $client)
                if($client->user_id==Auth::user()->id)
                    $nbr_client += 1;
            $nbr_rendez_vous = 0;
            foreach($rendez_vous as $rendez_vou)
                if($rendez_vou->etablissement_id==$etablissement->id)
                    $nbr_rendez_vous += 1;


            return view('dashboard',['clients'=> $clients,'etablissement'=> $etablissement,'users'=>$users,'rendez_vouss'=>$rendez_vous, 'nbr_rendez_vous' => $nbr_rendez_vous, 'nbr_client'=>$nbr_client]);
        }
    }


    public function indexx()
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

            $client_user_table= User::find($client->client_id);

            if($client!=null)
                return view('reservation.landing',['client'=> $client,'etablissement'=> $etablissement,'rendez_vouss'=>$rendez_vous,'client_user_table'=>$client_user_table]);
            else
                return view('welcome');
            }
            
        if(Auth::user()->role =='user'){

            $id=Auth::user()->id;
            $etablissement=DB::table('etablissements')->where('user_id','like','%'.Auth::user()->id.'%')->first();
            $users=User::all();
            $clients= Client::all();
            $rendez_vous= Rendez_vous::all();
            $nbr_client = 0;
            foreach($clients as $client)
                if($client->user_id==Auth::user()->id)
                    $nbr_client += 1;
            $nbr_rendez_vous = 0;
            foreach($rendez_vous as $rendez_vou)
                if($rendez_vou->etablissement_id==$etablissement->id)
                    $nbr_rendez_vous += 1;


            return view('dashboard',['clients'=> $clients,'etablissement'=> $etablissement,'users'=>$users,'rendez_vouss'=>$rendez_vous, 'nbr_rendez_vous' => $nbr_rendez_vous, 'nbr_client'=>$nbr_client]);
        }
    }

}
