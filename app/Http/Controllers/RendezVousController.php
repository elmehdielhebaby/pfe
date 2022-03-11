<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Rendez_vous;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreRendez_vousRequest;
use App\Http\Requests\UpdateRendez_vousRequest;

class RendezVousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role =='user'){
            $id=Auth::user()->id;
            $etablissement=DB::table('etablissements')->where('user_id','like','%'.Auth::user()->id.'%')->first();
            $users=User::all();
            $clients= Client::all();
            $rendez_vous= Rendez_vous::all();
            return view('client.rendez_vous_management',['clients'=> $clients,'etablissement'=> $etablissement,'users'=>$users,'rendez_vouss'=>$rendez_vous]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        echo 'loool';

        // Rendez_vous::create([
        //     // 'etablissement_id' => $data['etablissement_id'],
        //     // 'client_id' => $data['client_id'],
        //     // 'date' => $data['date'],
        //     // 'time' => $data['time'],
        //     'etablissement_id'=> 'lool',
        //     'client_id' => 'lool',
        //     'date' => $data['date'],
        //     'time' => $data['time']
        // ]);

        // return redirect()->back();
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRendez_vousRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        
        Rendez_vous::create([
            'etablissement_id' => Request('etablissement_id'),
            'client_id' => Request('client_id'),
            'date' => Request('date'),
            'time' => Request('time'),
        ]); 

        return redirect()->back()->with('success','Rendez_vous ajouter avec succès!!!');
  
      }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rendez_vous  $rendez_vous
     * @return \Illuminate\Http\Response
     */
    public function show(Rendez_vous $rendez_vous)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rendez_vous  $rendez_vous
     * @return \Illuminate\Http\Response
     */
    public function edit(Rendez_vous $rendez_vous)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRendez_vousRequest  $request
     * @param  \App\Models\Rendez_vous  $rendez_vous
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRendez_vousRequest $request, Rendez_vous $rendez_vous)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rendez_vous  $rendez_vous
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rendez_vous $rendez_vous)
    {
        //
    }

    public function annuler($id)
    {
        $rendez_vous=Rendez_vous::find($id);
        $rendez_vous->active=0;
        $rendez_vous->update();
        return redirect()->back()->withStatus(__('Profile successfully updated.'));
    }
}
