<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $collectionCustomers = Customer::orderBy("updated_at", "desc")->get();
        $collectionCustomers->map((function ($item) {
            return [$item->interests, $item->comment];
        }));
        return response()->json($collectionCustomers);
    }

    /**
     * Display an element of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Customer $customer)
    {
        return response()->json($customer);
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
            $customer = new Customer($request->validate([
                "name" => "required",
                "tel" => "required",
                "email" => "required|email",
                "status_id" => ''
            ]));

            $customer->save();

            return response()->json($customer);
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Customer $customer)
    {
        try {
            $customer->update($request->validate([
                "name" => "required",
                "tel" => "required",
                "email" => "required|email",
                "status_id" => ''
            ]));

            return response()->json($customer);
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }
}
