<?php

namespace App\Http\Controllers;

use App\Models\Rendez_vous;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRendez_vousRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRendez_vousRequest $request)
    {
        //
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
}
