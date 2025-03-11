<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function destroy(User $user)
    {
        $user->tokens()->delete();

        return [
            'message' => 'Vous avez été déconnecté.',
        ];
    }
}
