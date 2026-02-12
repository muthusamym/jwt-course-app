<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        return response()->json(['message'=>'Registered successfully']);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email','password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error'=>'Invalid credentials'], 401);
        }

        return response()->json([
            'token'=>$token,
            'user'=>auth()->user()
        ]);
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message'=>'Logged out']);
    }
}
