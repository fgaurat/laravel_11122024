<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request){
        Log::info($request->all());
        Log::info(Auth::attempt(['email' => $request->email, 'password' => $request->password]));
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $token = $user->createToken('auth_token')->accessToken;
            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
        }
        else{
            return response()->json([
                'error' => 'Unauthenticated'
            ], 401);
        }
    }
}
