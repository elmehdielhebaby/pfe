<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
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
        // if(Auth::user()->is_admin){
        //     // if($id==null){
        //     // return view('profile.edit_user_by_sup_admin');
        //     // }
        //     // else{
        //         return view('profile.edit_user_by_sup_admin');
        //     // }
        // }
        return view('profile.edit');

    }

    public function edit_user_by_sup_admin(User $admin)
    {
        // if(Auth::user()->is_admin){
            // if($id==null){
            // return view('profile.edit_user_by_sup_admin');
            // }
            // else{
                return view('profile.edit_user_by_sup_admin',['admin' => $admin]);
            // }
        // }
        // return view('profile.edit');

    }
    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    { 
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_profile' => __('You are not allowed to change data for a default user.')]);
        }

        auth()->user()->update($request->all());
        return back()->withStatus(__('Profile successfully updated.'));
    }

    // public function update_user_by_sup_admin(ProfileRequest_sup_admin $request,User $admin)
    // { 
    //     // if (auth()->user()->id == 1) {
    //     //     return back()->withErrors(['not_allow_profile' => __('You are not allowed to change data for a default user.')]);
    //     // }

    //     // auth()->user()->update($request->all());

    //     // return back()->withStatus(__('Profile successfully updated.'));
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
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_password' => __('You are not allowed to change the password for a default user.')]);
        }

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
