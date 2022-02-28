<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
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
        //     $list_user= User::all();
        //     $user=array(null);
        //     foreach($list_user as $admin)
        //     {
        //         $i=0;
        //         $j=0;
        //         if($admin->role=='user'){
        //             if($i==0){
        //                 $user=array($admin);
        //                 $i++;
        //             }
        //             else
        //             $user=array_push($admin);
        //         }
        //         if($admin->role=='client')
        //             $client=array_push($admin);           
        //     }

        // $client = DB::table('users')->where('role','like','client');
        // $user = DB::table('users')->where('role','like','user');
        $users= User::all();
        $etablissements= Etablissement::all();
        return view('users.index',['users' => $users,'etablissements'=>$etablissements]);


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
