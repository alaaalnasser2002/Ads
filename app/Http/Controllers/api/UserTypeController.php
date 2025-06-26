<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\UserType;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index()
    {
        return UserType::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $userType = UserType::create($request->all());
        return response()->json($userType, 201);
    }

    public function show(UserType $userType)
    {
        return response()->json($userType);
    }

    public function update(Request $request, UserType $userType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $userType->update($request->all());
        return response()->json($userType);
    }

    public function destroy(UserType $userType)
    {
        $userType->delete();
        return response()->json(null, 204);
    }
}

