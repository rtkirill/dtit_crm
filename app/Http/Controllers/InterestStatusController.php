<?php

namespace App\Http\Controllers;

use App\Models\InterestStatus;

class InterestStatusController extends Controller
{
    /**
     * Display the list of the resource.
     *
     * @param  \App\Models\InterestStatus  $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(InterestStatus::all());
    }
}
