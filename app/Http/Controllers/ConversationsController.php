<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConversationsController extends Controller
{
    public function retrieveMessages(Request $request, $catID){
        $inputs = $request->input();
        $currentUser = Auth::user();
        $conversation;
        $adviseeID;
        $adviserID;

        $checkAdviser = User_Types::where('user_id', Auth::id(), 'category_id', $catID)->get();
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
        $messages = $conversation->messages()::where('created_at', '>', $inputs['currentTimestamp']);
        $list = array();
        foreach ($messages as $message) {
            array_push($list, $message->user_id, $message->content);
        }


        return view('conversation', ['advisee_id' => $adviseeID, 'adviser_id' => $adviserID, 'messages' => $list]);
    }
}
