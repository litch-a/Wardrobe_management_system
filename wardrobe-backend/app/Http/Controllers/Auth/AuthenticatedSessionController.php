<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {
        $request->authenticate();
        
        $user = Auth::user();//Get authenticated user

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ], 200);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): JsonResponse
    {

        $request->user()->tokens()->delete();//REvoke all tokens

        return response()->json([
            'message' => 'Logged out successfully'
        ], 200);
    }
    public function getProfile(Request $request)
{
    return response()->json([
        'id' => $request->user()->id,
        'full_name' => $request->user()->name,
        'email' => $request->user()->email,
    ]);
}


    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['store', 'destroy']);
    }
}
