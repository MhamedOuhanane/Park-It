<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use App\Http\Requests\StoreParkingRequest;
use App\Http\Requests\UpdateParkingRequest;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $parkings = Parking::query();

        $search = $request->search ?? null;

        if ($search) {
            $parkings = $parkings->where('name', 'ILIKE', '%' . $search . '%');
        }

        $parkings = $parkings->paginate(4);
        
        foreach ($parkings as $parking) {
            $parking->disponible = $parking->reservations()->count() < $parking->places ? 'disponible' : 'plin';
        }

        return response()->json([
            'parkings' => $parkings,
            'search' => $search,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreParkingRequest $request)
    {
        $parking = Parking::create([
            'name' => $request->name,
            'places' => $request->places,
        ]);

        if ($parking) {
            return response()->json([
                'message' => 'Le parking est create avec succès!!!',
                'parkin' => $parking,
            ], 200);

        } else {
            return response()->json([
                'message' => 'Échec de la création du parking.',
            ], 500);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Parking $parking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParkingRequest $request, Parking $parking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parking $parking)
    {
        //
    }
}
