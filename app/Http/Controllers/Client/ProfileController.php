<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use App\Models\Etablissement;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\Client;

// use App\Http\Requests\ProfileRequest_sup_admin;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit() 
    {
        $client = DB::table('clients')->where('client_id','like','%'.Auth::user()->id.'%')->first(); 
        $etablissement = DB::table('etablissements')->where('user_id','like','%'.$client->user_id.'%')->first();
        $etablissement =Etablissement::find($client->user_id);
        if($client!=null)
            return view('reservation.profile',['client'=> $client,'etablissement'=> $etablissement]);
    }


    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    { 
        $client=Client::find(Request('clien_id'));
        // echo Request('client_id');
        $client->update($request->all());
        auth()->user()->update($request->all());
        
        return redirect()->back()->withStatus(__('Le Profile à été Modifié.'));




        // if (auth()->user()->id == 1) {
        //     return back()->withErrors(['not_allow_profile' => __('You are not allowed to change data for a default user.')]);
        // }

        // auth()->user()->update($request->all());
        // return back()->withStatus(__('Profile successfully updated.'));
    }

    // public function update_user_by_sup_admin(ProfileRequest_sup_admin $request,User $admin)
    // { 
    //      if (auth()->user()->id == 1) {
    //          return back()->withErrors(['not_allow_profile' => __('You are not allowed to change data for a default user.')]);
    //      }
    //      auth()->user()->update($request->all());
    //      return back()->withStatus(__('Profile successfully updated.'));
    //     return view('welcome');
    // }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        // if (auth()->user()->id == 1) {
        //     return back()->withErrors(['not_allow_password' => __('You are not allowed to change the password for a default user.')]);
        // }

        // auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        // return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
