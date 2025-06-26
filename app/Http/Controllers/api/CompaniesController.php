<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Company::all(); // عرض جميع الشركات
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo_url' => 'required|url',
            'website_url' => 'required|url',
            'description' => 'required|string',
        ]);

        $company = Company::create($request->all());
        return response()->json($company, 201); // إرجاع الشركة الجديدة مع حالة 201 Created
    }

    public function show($id)
    {
        return Company::findOrFail($id); // عرض شركة معينة
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'logo_url' => 'sometimes|required|url',
            'website_url' => 'sometimes|required|url',
            'description' => 'sometimes|required|string',
        ]);

        $company = Company::findOrFail($id);
        $company->update($request->all());
        return response()->json($company, 200); // إرجاع الشركة المحدثة مع حالة 200 OK
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return response()->json(null, 204); // إرجاع حالة 204 No Content بعد الحذف
    }
}
