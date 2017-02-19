<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConversationsController extends Controller
{
    public function retrieveMessages(Request $request){
        $inputs = $request->input();
        $currentUser = Auth::user();
        $conversation;
        $adviseeID;
        $adviserID;

        $category = Category::where('name', $inputs['categoryName'])->first();
        $checkAdviser = User_Types::where('user_id', Auth::id(), 'category_id', $category->id)->get();
        if($checkAdviser->isEmpty()){
            //user is advisee
            $adviseeID = $inputs['userID'];
            $adviserID = Auth::id();
        } else{
            //user is advisor
            $adviseeID = Auth::id();
            $adviserID = $inputs['userID'];
        }
        $conversation = Conversation::where('advisee_id', $adviseeID, 'adviser_id', $adviserID)->first();
        //$messages = $conversation->messages()::where('created_at', '>', $inputs['currentTimestamp']);
        $list = array();
        foreach ($messages as $message) {
            if($message->created_at > $inputs['currentTimestamp']) {
            array_push($list, $message->user_id, $message->content);
            }
        }

        //$messages = Message::where('user_id', Auth::id(), 'conversation_id', $conversation->id)->get();
        $advisee = User::find($adviseeID);
        $adviser = User::find($adviserID);

        return view('conversation', ['advisee_name' => $advisee->name, 'adviser_name' => $adviser->name, 'messages' => $list]);
    }
}
