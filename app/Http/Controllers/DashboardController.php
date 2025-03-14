<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use App\Models\Reservation;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parking = Parking::query();

        $parkingCount = $parking->count();
        $placeTotale = $parking->sum('places');
        $reservationCount = Reservation::count();
        $reservationTer = Reservation::where('status', 'Termine')->count();
        $utilisteurCount = Utilisateur::count();
        $porsentageRese = (($reservationCount - $reservationTer) * 100) / $placeTotale;

        $statistiques = [
            'parkingCount' => $parkingCount,
            'placeTotale' => $placeTotale,
            'reservationCount' => $reservationCount,
            'reservationTer' => $reservationTer,
            'utilisteurCount' => $utilisteurCount,
            'porsentageRese' => $porsentageRese,
        ];
        
        return response()->json($statistiques, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
