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
            'image_url'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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
    { $request->validate([
        'name' => 'required|string|max:255',
        'image_url' =>'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
        if ($request->hasFile('image_url')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($adType->image_url && file_exists(public_path('uploads/' . $adType->image_url))) {
                unlink(public_path('uploads/' . $adType->image_url));
            }
            // رفع الصورة الجديدة
            $image = $request->file('image_url');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $adType->image_url = $imageName;
        }
    
        $adType->name = $request->name;
        $adType->save();
    
        return response()->json($adType, 200);
    }
    
    

    // حذف نوع إعلان
    public function destroy(AdType $adType)
    {
        if ($adType->image_url && file_exists(public_path('uploads/' . $adType->image_url))) {
            unlink(public_path('uploads/' . $adType->image_url));
        }
        $adType->delete();
        return response()->json(null, 204);
    }
}
