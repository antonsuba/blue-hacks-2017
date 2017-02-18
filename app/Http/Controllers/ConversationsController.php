<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConversationsController extends Controller
{
    public function retrieveMessages(Request $request){
        $inputs = $request->input();
        $currentUser = Auth::user();
        $conversation;

        $checkAdviser = User_Types::where('user_id', Auth::id(), 'category_id', $inputs['categoryID'])->get()   ;
        if($checkAdviser->isEmpty()){
            //user is advisee
            $conversation = Conversation::where('advisee_id', $inputs['userID'], 'adviser_id', Auth::id());
        } else{
            //user is advisor
            $conversation = Conversation::where('advisee_id', Auth::id(), 'adviser_id', $inputs['userID']);
        }

        $messages = Message::where('user_id', Auth::id(), 'conversation_id', $conversation->id);

        return $messages;
    }
}
