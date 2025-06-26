<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Subscriptions;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Subscription::all(); // عرض جميع الاشتراكات
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'amount' => 'required|numeric|min:0',
            'plan' => 'required|string|max:255',
        ]);

        $subscription = Subscription::create($request->all());
        return response()->json($subscription, 201); // إرجاع الاشتراك الجديد مع حالة 201 Created
    }

    public function show($id)
    {
        return Subscription::findOrFail($id); // عرض اشتراك معين
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date|after:start_date',
            'amount' => 'sometimes|required|numeric|min:0',
            'plan' => 'sometimes|required|string|max:255',
        ]);

        $subscription = Subscription::findOrFail($id);
        $subscription->update($request->all());
        return response()->json($subscription, 200); // إرجاع الاشتراك المحدث مع حالة 200 OK
    }

    public function destroy($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
        return response()->json(null, 204); // إرجاع حالة 204 No Content بعد الحذف
    }
}
