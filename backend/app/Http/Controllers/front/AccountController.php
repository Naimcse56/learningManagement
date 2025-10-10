<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AccountController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:5|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'min:6',
                'confirmed',
                'regex:/[!@#$%^&*(),.?":{}|<>]/' // must contain at least one special character
            ],
        ], [
            'password.regex' => 'Password must contain at least one special character.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 200,
            'message' => 'User registered successfully!',
            'user' => $user,
            'token' => $token
        ], 200);

    }
}
