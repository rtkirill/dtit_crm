<?php

namespace App\Http\Controllers;

use App\Models\CustomerInterests;
use Illuminate\Http\Request;

class CustomerInterestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(CustomerInterests::orderBy('created_at', 'desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $customerInterests = new CustomerInterests($request->validate([
                "interest" => "required",
                "customer_id" => "required"
            ]));

            $customerInterests->save();

            return response()->json($request);

        } catch (\Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CustomerInterests $interest
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, CustomerInterests $interest)
    {
        try {
            $interest->update($request->validate([
                "interest" => "required",
                "customer_id" => "required"
            ]));

            return response()->json($interest);
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }
}
