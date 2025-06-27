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
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg|max:10240',
        ]);

       $ad = Ad::create([
        'title' => $request->title,
        'description' => $request->description,
        'user_id' => Auth::id()
       ]);

       if ($request->hasFile('images')){
        foreach($request->file('images') as $image) {
            $file_path=$image->store('ads/images', 'public');

        }
           }
      if ($request->hasFile('vedios')){
         foreach($request->file('vedios') as $image) {
             $file_path=$vedio->store('ads/vedios', 'public');
    
            }
               }
               return response()->json([
                'message' => 'تم إنشاء الإعلان بنجاح!',
                'ad' => $ad->load('images', 'video')
            ], 201); 
      
    }

    public function show($id)
    {
        return Ad::with(['images', 'videos', 'interactions', 'comments','ratings'])->findOrFail($id);


    }

    public function update(Request $request, $id)
    {
        $ad = Ad::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'inf_communication' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'sometimes|nullable|mimetypes:video/mp4,video/avi,video/mpeg|max:10240',
            'delete_image' => 'sometimes|boolean',
            'delete_video' => 'sometimes|boolean',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }
    
        $data = $request->only(['title', 'description', 'inf_communication']);
    
        // حذف الصورة إذا طلب المستخدم أو رفع صورة جديدة
        if ($request->has('delete_image') && $request->delete_image) {
            if ($ad->image) {
                Storage::disk('public')->delete($ad->image);
                $data['image'] = null;
            }
        } elseif ($request->hasFile('image')) {
            if ($ad->image) {
                Storage::disk('public')->delete($ad->image);
            }
            $imagePath = $request->file('image')->store('ads', 'public');
            $data['image'] = $imagePath;
        }
    
        // حذف الفيديو إذا طلب المستخدم أو رفع فيديو جديد
        if ($request->has('delete_video') && $request->delete_video) {
            if ($ad->video) {
                Storage::disk('public')->delete($ad->video);
                $data['video'] = null;
            }
        } elseif ($request->hasFile('video')) {
            if ($ad->video) {
                Storage::disk('public')->delete($ad->video);
            }
            $videoPath = $request->file('video')->store('ads', 'public');
            $data['video'] = $videoPath;
        }
    
        $ad->update($data);
    
        return response()->json([
            'status' => true,
            'message' => 'تم تحديث الإعلان بنجاح',
            'ad' => $ad
        ]);
    }  
    public function destroy($id)
{
    $ad = Ad::findOrFail($id);

    foreach ($ad->images as $image) {
        Storage::disk('public')->delete($image->file_path);
    }
    if ($ad->vedio) {
        Storage::disk('public')->delete($ad->vedio->file_path);
    }
    $ad->delete();

    return response()->json([
        'message' => 'تم حذف الإعلان بنجاح!'
    ]);   
    
}
    }

    

