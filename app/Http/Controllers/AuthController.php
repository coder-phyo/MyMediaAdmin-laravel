<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // user login release token
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (isset($user)) {
            if (Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status' => true,
                    'user' => $user,
                    'token' => $user->createToken(time())->plainTextToken,
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'token' => null,
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'token' => null,
            ]);

        }
    }

    // user register release token
    public function register(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        User::create($data);

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'user' => $user,
            'token' => $user->createToken(time())->plainTextToken,
        ]);
    }
}
