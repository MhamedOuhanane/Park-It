<?php

namespace App\Http\Controllers;

use App\Models\Administrateur;
use App\Http\Requests\StoreAdministrateurRequest;
use App\Http\Requests\UpdateAdministrateurRequest;

class AdministrateurController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Administrateur::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdministrateurRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Administrateur $administrateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdministrateurRequest $request, Administrateur $administrateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrateur $administrateur)
    {
        //
    }
}
