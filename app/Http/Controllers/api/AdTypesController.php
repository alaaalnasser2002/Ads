<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AdTypes;
use Illuminate\Http\Request;

class AdTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        return AdType::all();
    }

    // إنشاء نوع إعلان جديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $adType = AdType::create($request->all());
        return response()->json($adType, 201);
    }

    // عرض نوع إعلان محدد
    public function show(AdType $adType)
    {
        return $adType;
    }

    // تحديث نوع إعلان موجود
    public function update(Request $request, AdType $adType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $adType->update($request->all());
        return response()->json($adType, 200);
    }

    // حذف نوع إعلان
    public function destroy(AdType $adType)
    {
        $adType->delete();
        return response()->json(null, 204);
    }
}
