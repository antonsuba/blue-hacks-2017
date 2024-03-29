<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index($category){
        return view('message');
    }

    public function sendMessage(Request $request){
        $inputs = $request->input();
        $conversation;

        $checkAdviser = User_Types::where('user_id', Auth::id(), 'category_id', $inputs['categoryID'])->get();
        if($checkAdviser->isEmpty()){
            //user is advisee
            $conversation = Conversation::where('advisee_id', $inputs['userID'], 'adviser_id', Auth::id())->get();
        } else{
            //user is advisor
            $conversation = Conversation::where('advisee_id', Auth::id(), 'adviser_id', $inputs['userID'])->get();
        }

        $message = new Message;
        $message->content = $inputs['content'];
        $message->user_id = Auth::id();
        $message->conversation_id = $conversation->id;
        
        $message->save();
    }
}
