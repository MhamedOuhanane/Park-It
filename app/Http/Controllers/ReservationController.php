<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $user = Utilisateur::find(Auth::id());
        
        $parkingId = $request->parking_id;
        
        $user->parkings()->attach($parkingId, [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'created_at' => now(),
            'end_date' => now(),
        ]);

        return response()->json([
            'message' => 'La reservation de plase est complet',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
