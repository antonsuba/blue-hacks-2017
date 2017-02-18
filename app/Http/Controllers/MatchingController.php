<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserType;

class MatchingController extends Controller
{
    //Laravel.generate.code();
    public function getAdviser(Request $request){
        $inputs = $request->input();

        $results = UserType::where('category_id', $inputs['categoryID'])->orderBy('rating', 'desc')->limit(5)->get();
        $advisers = array();
        foreach ($results as $result) {
            $adviser = User::where('id', $result->user_id);
            array_push($advisers, $adviser);
        }
        $adviser = $advisers[rand(0, 4)];

        createPost($inputs['content'], $adviser->id);
    }

    public function createPost($content, $adviserID){
        $conversation = new Conversation;
        $conversation->advisee_id = Auth::id();
        $conversation->adviser_id = User::find($adviserID);
        $conversation->save();

        $message = new Message();
        $message->user_id = Auth::id();
        $message->content = $content;
        $message->conversation_id = $conversation->id;
        $message->save();
    }
}
