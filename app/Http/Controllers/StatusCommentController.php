<?php

namespace App\Http\Controllers;

use App\Models\StatusComment;
use Illuminate\Http\Request;

class StatusCommentController extends Controller
{
    public function index()
    {
        return response()->json(StatusComment::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $statusComment = new StatusComment($request->validate([
                "comment" => "required",
                "customer_id" => "required",
            ]));

            $statusComment->save();

            return response()->json($statusComment);
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Update comment
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, StatusComment $comment)
    {
        try {
            $comment->update($request->validate([
                "comment" => "required",
                "customer_id" => "required",
            ]));

            return response()->json($comment);
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }
}
