<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if( !$user || ! Hash::check($request->password, $user->password)){
            return response()->json([
                'success' => false,
                'message' => 'unauthorized',
            ], 401);
        }

        $user->tokens()->delete();
        $token = $user->createToken($request->email)->plainTextToken;
        return response()->json([
            'success' => true,
            'message' => 'berhasil login',
            'token' => $token
        ], 200);   
          
    }
}
