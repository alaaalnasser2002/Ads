<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('api-token')->plainTextToken;

        // جلب الأدوار والصلاحيات للمستخدم
        $roles = $user->roles->pluck('name');
        $permissions = $user->roles->flatMap->permissions->pluck('name')->unique();

        return response()->json([
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'email' => $user->email,
                'roles' => $roles,
                'permissions' => $permissions,
            ]
        ]);
    }
  
}
