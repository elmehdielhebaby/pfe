<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
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

class AdminController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\Admin  $model
     * @return \Illuminate\View\View
     */
    

    public function home()
    {   
        $clients= Client::all();
        $nbr_client=count($clients);
        $etablissements= Etablissement::all();
        $nbr_etablissement=count($etablissements) ;
        $rendez_vous = Rendez_vous::all();
        $nbr_rendez_vous=count($rendez_vous);
        $etablissements= Etablissement::all();

        $nbr_retailers=count(DB::table('etablissements')->where('categorie','like','retailers')->get());
        $nbr_sports=count(DB::table('etablissements')->where('categorie','like','sports')->get());
        $nbr_medical=count(DB::table('etablissements')->where('categorie','like','medical')->get());
        $nbr_education=count(DB::table('etablissements')->where('categorie','like','education')->get());
        $nbr_officiel=count(DB::table('etablissements')->where('categorie','like','officiel')->get());
        
        $jan=0;
        $fev=20;$mar=15;$avr=30;$mai=25;$jun=40;$jul=35;$aou=50;$sep=45;$oct=60;$nov=55;$dec=70;

        $nbr_rendez_vous_ok=0;
        foreach($rendez_vous as $rendez_vou)
            if($rendez_vou->active==2)
                $nbr_rendez_vous_ok +=1;
                
        $segment="home";
        return view('admin.index',['nbr_client' => $nbr_client,'segment'=>$segment,'nbr_etablissement'=>$nbr_etablissement,'nbr_rendez_vous'=>$nbr_rendez_vous,'nbr_rendez_vous_ok' => $nbr_rendez_vous_ok,'retailers' => $nbr_retailers,'sports' => $nbr_sports,'medical' => $nbr_medical,'education' => $nbr_education,'officiel' => $nbr_officiel,'jan'=>$jan,'fev'=>$fev,'mar'=>$mar,'avr'=>$avr,'mai'=>$mai,'jun'=>$jun,'jul'=>$jul,'aou'=>$aou,'sep'=>$sep,'oct'=>$oct,'nov'=>$nov,'dec'=>$dec]);
    
    }

    public function check(Request $request){
        $request->validate([
            'email' => 'required| email|exists:admins,email',
            'password' => 'required| min:8|max:30'
        ]);
        
        $creds = $request->only('email','password');

        if(Auth::guard('admin')->attempt($creds))
            return redirect()->route('admin.home');
        else
            return redirect()->route('admin.login')->whith('fail','erreur');
    }

    public function logout(){
        Auth::guard('admin')->logout();

        return redirect('/');
    }
}
