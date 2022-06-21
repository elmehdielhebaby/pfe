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
use Mockery\Generator\StringManipulation\Pass\Pass;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */

    public function home()
    {   
        $etablissement=DB::table('etablissements')->where('user_id','like','%'.Auth::user()->id.'%')->first();
        $clients=DB::table('clients')->where('etablissement_id','like','%'.$etablissement->id.'%')->get();
        $rendez_vous = DB::table('rendez_vouses')->where('etablissement_id','like','%'.$etablissement->id.'%')->get();
        $rendez_vous_ok = DB::table('rendez_vouses')->where('etablissement_id','like','%'.$etablissement->id.'%')->where('active','=',2)->get();
        $nbr_client = count($clients);
        $nbr_rendez_vous_ok=count($rendez_vous_ok);
        $nbr_rendez_vous=count($rendez_vous);
        
        $nbr_client_sont_rdv=0;
        foreach($clients as $client){
            $i=0;
            foreach($rendez_vous as $rendez_vou){
                if($client->id ==$rendez_vou->client_id){
                    $i=1;
                }
            }
            if ($i==0)
                $nbr_client_sont_rdv += 1;
        }
        
        $jan=0;
        $fev=20;$mar=15;$avr=30;$mai=25;$jun=40;$jul=35;$aou=50;$sep=45;$oct=60;$nov=55;$dec=70;
        $a=10;$b=20;$c=30;$d=40;$d=50;$e=60;
        $segment='home';
        return view('dashboard',['etablissement'=> $etablissement,'nbr_rendez_vous' => $nbr_rendez_vous, 'nbr_client'=>$nbr_client,'nbr_client_sont_rdv'=>$nbr_client_sont_rdv,'nbr_rendez_vous_ok'=>$nbr_rendez_vous_ok,'jan'=>$jan,'fev'=>$fev,'mar'=>$mar,'avr'=>$avr,'mai'=>$mai,'jun'=>$jun,'jul'=>$jul,'aou'=>$aou,'sep'=>$sep,'oct'=>$oct,'nov'=>$nov,'dec'=>$dec,'a'=>$a,'b'=>$b,'c'=>$c,'d'=>$d,'e'=>$e,'segment'=>$segment]);
        
    }


    public function client_management()
    {
        $etablissement = DB::table('etablissements')->where('user_id', 'like', '%' . Auth::user()->id . '%')->first();
        $clients = DB::table('clients')->where('etablissement_id', 'like', '%' . $etablissement->id . '%')->paginate(7);
        $segment = "client_management";
        return view('users.client_management', ['etablissement' => $etablissement, 'clients' => $clients, 'segment' => $segment]);
    }


    public function create(Request $request){

        $request->validate([
            'name' => 'required|string| max:255',
            'email' => 'required| string| email|max:255|unique:users',
            'password' => 'required| string|min:8|confirmed'
        ]);

        $user= new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        $lastInsertedId= $user->id;
        $etablissement = new Etablissement();
        $etablissement->name =$request->titre ;
        $etablissement->phone=$request->phone ;
        $etablissement->user_id =$lastInsertedId ;
        $etablissement->categorie =$request->categorie ;
        $etablissement->adresse =$request->adresse ;
        $etablissement->service =$request->service ;
        $etablissement->url =$request->url ;
        $etablissement->description =$request->description ;
        $save_etablissement= $etablissement->save();

        if($save && $save_etablissement)
            auth()->login($user);
            return redirect()->route('user.home');
    }

    public function check(Request $request){

            // $request->validate([
            //     'email' => 'required| email|exists:users,email',
            //     'password' => 'required| min:8'
            // ]);

            $creds = $request->only('email','password');
            if(Auth::guard('web')->attempt($creds))
                return redirect()->route('user.home');
            else{
                $request->validate([
                    'email' => 'required| email|exists:admins,email',
                    'password' => 'required| min:8|max:30'
                ]);
            
                $creds = $request->only('email','password');
                if(Auth::guard('admin')->attempt($creds))
                    return redirect()->route('admin.home');
                else
                    return redirect()->route('user.login')->whith('fail','erreur');
            }
    }

    public function logout(){
        Auth::guard('web')->logout();

        return redirect('/user');
    }
}
