<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReplyResource;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ReplyResource::collection(Reply::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $reply = new Reply();
        $reply->body = $request->input('body');
        $reply->save();

        return response()->json([
            'message' => 'Reply has been created successfully',
            'message_type' => 'success'
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Reply $reply
     * @return ReplyResource
     */
    public function show(Reply $reply)
    {
        return new ReplyResource($reply);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        $reply->body = $request->input('body');
        $reply->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Reply $reply
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Reply $reply)
    {
        $reply->delete();

        return response()->json([
            'message' => 'Reply has been deleted successfully',
            'message_type' => 'success'
        ], Response::HTTP_OK);
    }

    public function like(Reply $reply)
    {
        //TODO:
    }

    public function dislike(Reply $reply)
    {
        // TODO
    }
}
