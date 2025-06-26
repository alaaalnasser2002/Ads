<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Ad::all(); // عرض جميع الإعلانات
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $ad = Ad::create($request->all());
        return response()->json($ad, 201); // إرجاع الإعلان الجديد مع حالة 201 Created
    }

    public function show($id)
    {
        return Ad::findOrFail($id); // عرض إعلان معين
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
        ]);

        $ad = Ad::findOrFail($id);
        $ad->update($request->all());
        return response()->json($ad, 200); // إرجاع الإعلان المحدث مع حالة 200 OK
    }

    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);
        $ad->delete();
        return response()->json(null, 204); // إرجاع حالة 204 No Content بعد الحذف
    }
}
