<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function auth(AuthRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Usuário ou senha não encontrados.'],
            ]);
        }

        // Logout others devices
        // if ($request->has('logout_others_devices')) $user->tokens()->delete();
        $user->tokens()->delete();

        $token = $user->createToken($request->device_name)->plainTextToken;

        // return response()->json(['token'=>$token]);
        return ['token' => $token];
    }
}
