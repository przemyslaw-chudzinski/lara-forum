<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return QuestionResource::collection(Question::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = new Question($request->all());
        $question->slug = Str::slug($question->title);
        $question->user_id = (int) Auth::id();
        $question->save();

        return response()->json([
            'message' => 'Question has been created successfully',
            'message_type' => 'success'
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Question $question
     * @return QuestionResource
     */
    public function show(Question $question)
    {
        return new QuestionResource($question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Question $question
     * @return void
     */
    public function update(Request $request, Question $question)
    {
        $question->title = $request->input('title');
        $question->body = $request->input('body');

        $question->isDirty() && $question->save();

        return response()->json([
            'message' => 'Question has been updated successfully',
            'message_type' => 'success'
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Question $question
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return response()->json([
            'message' => 'Question has been deleted successfully',
            'message_type' => 'success'
        ], Response::HTTP_OK);
    }
}
