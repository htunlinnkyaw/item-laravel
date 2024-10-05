<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request)
    {

        // return $request;

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json(["message" => "register success", 'token' => $token], 200);

    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;

            return response()->json(['message' => 'Login success', 'token' => $token]);
        }

        return response()->json(['message' => 'Login failed'], 401);
    }

    public function logout(Request $request)
    {
        return $request->user()->currentAccessToken();

        // return response()->json(['message' => 'Logout success', 'token' => $token], 200);

    }
}

