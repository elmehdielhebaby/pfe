<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Rendez_vous;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if(Auth::user()->role =='user'){
            $id=Auth::user()->id;
            $etablissement=DB::table('etablissements')->where('user_id','like','%'.Auth::user()->id.'%')->first();
            $users=User::all();
            $clients= Client::all();
            $rendez_vous= Rendez_vous::all();
            return view('client.client_management',['clients'=> $clients,'etablissement'=> $etablissement,'users'=>$users,'rendez_vouss'=>$rendez_vous]);
        }
    }
   
}
