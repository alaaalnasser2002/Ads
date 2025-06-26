<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
   public function index()
    {
        return User::all();
    }

    // إنشاء مستخدم جديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // تشفير كلمة المرور
        ]);

        return response()->json($user, 201);
    }

    // عرض مستخدم محدد
    public function show(User $user)
    {
        return response()->json($user);
    }

    // تحديث مستخدم موجود
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|string|min:8',
        ]);

        if ($request->has('password')) {
            $user->password = Hash::make($request->password); // تشفير كلمة المرور إذا تم تحديثها
        }

        $user->update($request->only('name', 'email', 'password'));
        return response()->json($user);
    }

    // حذف مستخدم
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
