<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisteredUserRequest;
use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
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
    public function store(RegisteredUserRequest $request)
    {
        $user = Utilisateur::create($request->all());

        $token = $user->createToken($request->email);

        return response()->json([
            'message' => 'regester valide',
        ]);
    }
}
