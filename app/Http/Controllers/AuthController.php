<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');
        // if (Auth::attempt(['email' => $login, 'password' => $password])) {
            // return response()->json(['user'=>$user->name]);
            // }
            
            $user = User::where('email', $login)->where('password', $password)->first();
        if ($user) {
            return response()->json(['user'=>$user->name]);
        } else {
            return response()->json(['exists' => false]);
        }
    }

    public function logout(Request $request)
    {

    }
}
