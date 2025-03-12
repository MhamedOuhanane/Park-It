<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Parking;
use App\Models\Utilisateur;
use Carbon\Carbon;
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
        
        $parking = Parking::find($request->parking_id);

        if ($parking->reservations()->count()) {
            return  response()->json([
                    'message' => 'Le parking est plein.',
                ]);
        }
        
        $user->parkings()->attach($parking->id, [
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
        $start_date = Carbon::parse($reservation->start_date);
        
        if ($start_date->subHour() <= now()) {
            return response()->json([
                'message' => "Vous n'avez pas la permission de modifier votre réservation.",
            ], 403);
        }
        

        $reservation->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,  
            'updated_at' => now(), 
        ]);
    
        return response()->json([
            'message' => 'Votre réservation a été mise à jour avec succès.',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        if (!$reservation) {
            return response()->json([
                'message' => 'Réservation non trouvée.',
            ], 404);
        }
        
        $reservation->delete();
        
        // if (Auth::user()->role->name == 'admin') {

            return response()->json([
                'message' => 'La reservation est annuler avec succès.',
            ], 200);

        // } else {
        //     # code...
        // }
        
    }
}
