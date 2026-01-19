<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
{
    $request->validate([
        "name" => "required|string|max:255",
        "email" => "required|email|unique:users",
        "password" => "required|min:8"
    ]);

    $user = User::create([
        "name" => $request->name,
        "email" => $request->email,
        "password" => bcrypt($request->password),
    ]);

    // Register hote hi JWT token return
    $token = auth('api')->login($user);

    return response()->json([
        "status" => true,
        "message" => "User registered successfully",
        "user" => $user,
        "token" => $token,
        "token_type" => "bearer",
        "expires_in" => auth('api')->factory()->getTTL() * 60
    ]);
}
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return response()->json([
            'status' => true,
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function refresh()
    {
        try {
            // Refresh the token
            $newToken = auth('api')->refresh();

            return response()->json([
                'status' => true,
                'token' => $newToken,
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60
            ]);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['status' => false, 'message' => 'Token is invalid'], 401);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['status' => false, 'message' => 'Token could not be refreshed'], 401);
        }
    }

    public function logout()
    {
        auth('api')->logout();
        return response()->json(['status' => true, 'message' => 'Logged out successfully']);
    }

    public function me()
    {
        return response()->json(auth('api')->user());
    }
}
