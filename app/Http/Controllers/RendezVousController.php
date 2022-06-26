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
        $etablissement=DB::table('etablissements')->where('user_id','like','%'.Auth::user()->id.'%')->first();
        $clients=DB::table('clients')->where('etablissement_id','like','%'.$etablissement->id.'%')->get();
        $toDate=now();
        $rendez_vous = DB::table('rendez_vouses')->where('etablissement_id','like','%'.$etablissement->id.'%')->where('date', '>', $toDate)->orderBy('date','asc')->paginate(9);
        $segment="index";
        return view('users.rendez_vous_management',['etablissement'=> $etablissement,'clients'=> $clients,'etablissement'=> $etablissement,'rendez_vouss'=>$rendez_vous,'segment'=>$segment]);
    }

    public function history()
    {
        $etablissement=DB::table('etablissements')->where('user_id','like','%'.Auth::user()->id.'%')->first();
        $clients=DB::table('clients')->where('etablissement_id','like','%'.$etablissement->id.'%')->get();
        $toDate=now();
        $rendez_vous = DB::table('rendez_vouses')->where('etablissement_id','like','%'.$etablissement->id.'%')->where('date', '<', $toDate)->orderBy('date','asc')->paginate(9);
        $segment="history";
        return view('users.rendez_vous_history',['etablissement'=> $etablissement,'clients'=> $clients,'etablissement'=> $etablissement,'rendez_vouss'=>$rendez_vous,'segment'=>$segment]);
    }

    public function today_rendez_vous()
    {
        $etablissement=DB::table('etablissements')->where('user_id','like','%'.Auth::user()->id.'%')->first();
        $clients=DB::table('clients')->where('etablissement_id','like','%'.$etablissement->id.'%')->get();
        $toDate = date('Y-m-d', time());
        $rendez_vous = DB::table('rendez_vouses')->where('etablissement_id','like','%'.$etablissement->id.'%')->where('date', '=', $toDate)->orderBy('time','asc')->paginate(9);
        $segment="today_rendez_vous";
        return view('users.today_rendez_vous',['etablissement'=> $etablissement,'clients'=> $clients,'etablissement'=> $etablissement,'rendez_vouss'=>$rendez_vous,'segment'=>$segment]);
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

        return redirect()->back()->with('success','Rendez Vous ajouter avec succès ');
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
        $date_rdv=$rendez_vous->created_at;
        $diff=now()->diffInHours($date_rdv);
        if($diff<24 || Auth::user()->role=='user'){
            // if(Auth::user()->role =='user'){
            if($rendez_vous->active==0){
                    return redirect()->back()->with('rdv_deja','Le Rendez Vous est déjà Annulé');
                }else{
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
                    
                    return redirect()->back()->with('rdv_annl','Le Rendez Vous à été Annulé');
                }
        }else
        return redirect()->back()->with('rdv_annl_imp'," Interdit l’annulation d’un rendez-vous après un jour");
        
    }

    public function user_annuler_rdv($id)
    {
        $rendez_vous=Rendez_vous::find($id);
        if($rendez_vous->active==0){
                return redirect()->back()->with('rdv_deja','Le Rendez Vous est déjà Annulé');
            }else{
                $rendez_vous->active=0;
                $rendez_vous->update();
                $etablissement=DB::table('etablissements')->where('user_id','like','%'.Auth::user()->id.'%')->first();
                $client=Client::find($rendez_vous->client_id);
                $details = [
                    'name_etablissement'=> $etablissement->name,
                    'name_client'=> $client->name,
                    'date' => $rendez_vous->date,
                    'time' => $rendez_vous->time,
                    'adress' => $etablissement->adresse,
                ];
                
                Mail::to($client->email)->send(new MailCanceled($details));
                
                return redirect()->back()->with('rdv_annl','Le Rendez Vous à été Annulé');
            }
    }


    public function confirmer($id)
    {
        $rendez_vous=Rendez_vous::find($id);
        if($rendez_vous->active==2){
            return redirect()->back()->with('rdv_deja','Le Rendez Vous est déjà Confirmé');
        }else{
            $rendez_vous->active=2;
            $rendez_vous->update();

            $etablissement=DB::table('etablissements')->where('user_id','like','%'.Auth::user()->id.'%')->first();
            $client=Client::find($rendez_vous->client_id);
            $details = [
                'name_etablissement'=> $etablissement->name,
                'name_client'=> $client->name,
                'date' => $rendez_vous->date,
                'time' => $rendez_vous->time,
                'adress' => $etablissement->adresse,
            ];
            
            Mail::to($client->email)->send(new MailAccepted($details));

            return redirect()->back()->with('rdv_confirmer','Le Rendez Vous à été Confirmé');
        }
    }
    public function pdf(){
        
        $id=request('id');
        $rendez_vous=Rendez_vous::find($id);
        
        if($rendez_vous->active==2){
            // $client=DB::table('clients')->where('id','like','%'.$rendez_vous->client_id.'%')->first();
            // $client = Auth::user();
            $etablissement=Etablissement::find($rendez_vous->etablissement_id);
            $user=User::find($etablissement->user_id);
            $email_etablissement=$user->email;
            $pdf = PDF::loadView('reservation.pdf', ['rendez_vous'=>$rendez_vous,'etablissement'=>$etablissement,'email_etablissement'=>$email_etablissement]);
            return $pdf->download('Rendez_Vous.pdf');
        }else{
            if($rendez_vous->active==1)
                return redirect()->back()->with('rdv_pas_encore_accepte','Rendez Vous pas encore accepté');
            if($rendez_vous->active==0)
                return redirect()->back()->with('rdv_est_annule','Rendez Vous annulé');
            
        }
    }

    public function rendez_vous_list_pdf(){

        $etablissement=DB::table('etablissements')->where('user_id','like','%'.Auth::user()->id.'%')->first();
        $clients=DB::table('clients')->where('etablissement_id','like','%'.$etablissement->id.'%')->get();
        $toDate = date('Y-m-d', time());
        $rendez_vous = DB::table('rendez_vouses')->where('etablissement_id','like','%'.$etablissement->id.'%')->where('date', '=', $toDate)->get();
        $pdf = PDF::loadView('users.Rendez_Vous_list_pdf', ['rendez_vouss'=>$rendez_vous,'etablissement'=>$etablissement,'clients'=>$clients, 'toDate' => $toDate ]);
        return $pdf->download('Rendez_Vous_list.pdf');
    }

}