<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Client;
use App\Mail\MailAccepted;
use App\Mail\MailCanceled;
use App\Models\Rendez_vous;
use Faker\Provider\DateTime;
use GuzzleHttp\Psr7\Request;
use App\Models\Etablissement;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreRendez_vousRequest;
use App\Http\Requests\UpdateRendez_vousRequest;
use Illuminate\Support\Facades\Date;

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
      
        return redirect()->back();
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
    public function search(Rendez_vous $rendez_vous)
    {
        // Request('date')
        $time=DB::table('rendez_vouses')->where('time','like','%'.Request('date').'%');

        return redirect()->back();
        // echo 'lool';

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
        // if(Auth::user()->role =='user'){
        $rendez_vous->active=0;
        $rendez_vous->update();

        $etablissement=DB::table('etablissements')->where('id','like','%'.Request('etablissement_id').'%')->first();
        $client=User::find($rendez_vous->client_id);
        $details = [
            'name_etablissement'=> $etablissement->name,
            'name_client'=> $client->name,
            'date' => $rendez_vous->date,
            'time' => $rendez_vous->time,
            'adress' => $etablissement->adresse,
        ];
        
        Mail::to($client->email)->send(new MailCanceled($details));
        
        return redirect()->back()->withStatus(__('Profile successfully updated.'));
        // }else{

            // $lol=Carbon::now();
            // $sub = date_diff($lol, $rendez_vous->date);
            // echo $sub;
            
            // $origin = new DateTime('2009-10-11');
            // $target = new DateTime('2009-10-13');
            // $interval = $origin->diff($target);
            // echo $interval->format('%R%a days');

            $sub =new Date($rendez_vous->date);

            // $end = $start->copy()->subDay(1);

            // echo $id."<br>";
            // echo $lol."<br>";
            // // echo $sub."<br>";
            // echo $sub->diffInDays($lol);
            // if()

            // if(){

            // }else{

            // }
            
        // }
    }

    public function Confirmer($id)
    {
        $rendez_vous=Rendez_vous::find($id);
        $rendez_vous->active=2;
        $rendez_vous->update();

        $etablissement=DB::table('etablissements')->where('id','like','%'.Request('etablissement_id').'%')->first();
        $client=User::find($rendez_vous->client_id);
        $details = [
            'name_etablissement'=> $etablissement->name,
            'name_client'=> $client->name,
            'date' => $rendez_vous->date,
            'time' => $rendez_vous->time,
            'adress' => $etablissement->adresse,
        ];
        
        Mail::to($client->email)->send(new MailAccepted($details));

        return redirect()->back()->withStatus(__('Profile successfully updated.'));
    }
    public function pdf(){
        
        $id=request('id');
        $rendez_vous=Rendez_vous::find($id);
        
        if($rendez_vous->active==2){
            $client=DB::table('clients')->where('client_id','like','%'.$rendez_vous->client_id.'%')->first();
            $user = Auth::user();
            $etablissement=Etablissement::find($rendez_vous->etablissement_id);
            $pdf = PDF::loadView('reservation.pdf', ['user'=>$user,'rendez_vous'=>$rendez_vous,'etablissement'=>$etablissement,'client'=>$client]);
            return $pdf->download('Rendez_Vous.pdf');
        }else{
            return redirect()->back()->withStatus(__('Rendez vous non accepted yeat'));
        }
    }

}