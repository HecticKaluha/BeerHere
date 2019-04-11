<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        //Validate fields
        $this->validate($request, ['email' => 'required|email', 'password' => 'required']);
        //Attempt validation
        $credentials = $request->only(['email', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Incorrect credentials'], 401);
        }
        return response()->json(compact('token'));
    }

    public function register(Request $request)
    {
//        //Validate fields
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'gender' => 'required|string|min:1',
            'birthdate' => 'required|date|before:'.Carbon::now()->subYears(18)->startOfDay(),
            'place' => 'required|string|min:2',
            'password' => 'required|string|min:6|confirmed',
        ]);
//        //Create user, generate token and return
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'gender' => $request['gender'],
            'birthdate' => Carbon::parse($request['birthdate']),
            'place' => $request['place'],
            'last_login' => Carbon::now(),
            'password' => Hash::make($request['password']),
        ]);
        $token = JWTAuth::fromUser($user);
        return response()->json(compact('token'));
    }
}
