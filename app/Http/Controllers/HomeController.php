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
            $clients= Client::all();
            $nbr_client=count($clients);
            $etablissements= Etablissement::all();
            $nbr_etablissement=count($etablissements) ;
            $rendez_vous = Rendez_vous::all();
            $nbr_rendez_vous=count($rendez_vous);

            $retailers=0;
            $sports=0;
            $medical=0;
            $education=0;
            $officiel=0;
            foreach($etablissements as $etablissement)
                switch( $etablissement->categorie){
                    case 'Retailers':
                        $retailers+=1;
                        break;
                    case 'Sports':
                        $sports+=1;
                        break;
                    case 'Médical':
                        $medical+=1;
                        break;
                    case 'Education':
                        $education+=1;
                        break;
                    case 'Officiel':
                        $officiel+=1;
                        break;
                    default :
                        break;
                }

            $jan=0;
            $fev=20;$mar=15;$avr=30;$mai=25;$jun=40;$jul=35;$aou=50;$sep=45;$oct=60;$nov=55;$dec=70;

            $nbr_rendez_vous_ok=0;
            foreach($rendez_vous as $rendez_vou)
                if($rendez_vou->active==2)
                    $nbr_rendez_vous_ok +=1;

            return view('admin.index',['nbr_client' => $nbr_client,'nbr_etablissement'=>$nbr_etablissement,'nbr_rendez_vous'=>$nbr_rendez_vous,'nbr_rendez_vous_ok' => $nbr_rendez_vous_ok,'retailers' => $retailers,'sports' => $sports,'medical' => $medical,'education' => $education,'officiel' => $officiel,'jan'=>$jan,'fev'=>$fev,'mar'=>$mar,'avr'=>$avr,'mai'=>$mai,'jun'=>$jun,'jul'=>$jul,'aou'=>$aou,'sep'=>$sep,'oct'=>$oct,'nov'=>$nov,'dec'=>$dec]);
        }

        if(Auth::user()->role =='client'){
            $client = DB::table('clients')->where('client_id','like','%'.Auth::user()->id.'%')->first();  
            // $etablissement = DB::table('etablissements')->where('user_id','like','%'.$client->user_id.'%')->first();
            $etablissement =Etablissement::find($client->user_id);
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
            $nbr_client_sont_rdv=0;
            $nbr_rendez_vous_ok=0;
            
            foreach($clients as $client){
                if($client->user_id==Auth::user()->id){
                    $nbr_client += 1;
                    $i=0;
                    foreach($rendez_vous as $rendez_vou)
                        if($rendez_vou->client_id ==$client->id){
                            $i=1;
                            if($rendez_vou->active==2)
                            $nbr_rendez_vous_ok +=1;
                        }
                    if($i==0)
                        $nbr_client_sont_rdv += 1;
                }
            }
            $nbr_rendez_vous = 0;
            foreach($rendez_vous as $rendez_vou)
                if($rendez_vou->etablissement_id==$etablissement->id)
                    $nbr_rendez_vous += 1;

            $jan=0;
            $fev=20;$mar=15;$avr=30;$mai=25;$jun=40;$jul=35;$aou=50;$sep=45;$oct=60;$nov=55;$dec=70;

            $a=10;$b=20;$c=30;$d=40;$d=50;$e=60;

            return view('dashboard',['etablissement'=> $etablissement,'nbr_rendez_vous' => $nbr_rendez_vous, 'nbr_client'=>$nbr_client,'nbr_client_sont_rdv'=>$nbr_client_sont_rdv,'nbr_rendez_vous_ok'=>$nbr_rendez_vous_ok,'jan'=>$jan,'fev'=>$fev,'mar'=>$mar,'avr'=>$avr,'mai'=>$mai,'jun'=>$jun,'jul'=>$jul,'aou'=>$aou,'sep'=>$sep,'oct'=>$oct,'nov'=>$nov,'dec'=>$dec,'a'=>$a,'b'=>$b,'c'=>$c,'d'=>$d,'e'=>$e]);
        }
    }


    public function indexxx()
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
