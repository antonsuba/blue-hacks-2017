<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\UserType;
use App\Conversation;
use App\User;
use App\Message;

use Auth;

class ConversationsController extends Controller
{
    public function retrieveMessages($categoryName, $userID){
        //$inputs = $request->input();
        $currentUser = Auth::user();
        $conversation;
        $adviseeID;
        $adviserID;

        $category = Category::where('name', $categoryName)->first();
        $checkAdviser = UserType::where(['user_id'=>Auth::id(), 'category_id'=>$category["id"]])->get();
        if($checkAdviser->isEmpty()){
            //user is advisee
            $adviseeID = Auth::id();
            $adviserID = $userID;
        } else{
            //user is advisor
            $adviseeID = $userID;
            $adviserID = Auth::id();
        }

        $conversation = Conversation::where(['advisee_id'=>$adviseeID, 'adviser_id'=>$adviserID])->first();
        //$messages = $conversation->messages();
        $messages = Message::where('conversation_id',3)->get();

        $list = array();
        foreach ($messages as $message) {
            array_push($list, $message->user_id);
            array_push($list, $message->content);
        }

        $advisee = User::find($adviseeID);
        $adviser = User::find($adviserID);

        return view('conversation', ['advisee_name' => $advisee->name, 'adviser_name' => $adviser->name, 'messages' => $list]);
    }

    public function updateMessages(Request $request) {
        $inputs = $request->input();
        $currentUser = Auth::user();
        $conversation;
        $adviseeID;
        $adviserID;

        $category = Category::where('name', $inputs['category_name'])->first();
        $checkAdviser = User_Types::where('user_id', Auth::id(), 'category_id', $category->id)->get();
        if($checkAdviser->isEmpty()){
            //user is advisee
            $adviseeID = Auth::id();
            $adviserID = $inputs['user_id'];
        } else{
            //user is advisor
            $adviseeID = $inputs['user_id'];
            $adviserID = Auth::id();
        }
        $conversation = Conversation::where('advisee_id', $adviseeID, 'adviser_id', $adviserID)->first();
        $messages = $conversation->messages();
        $list = array();
        foreach ($messages as $message) {
            if($message->created_at > $inputs['currentTimestamp']) {
            array_push($list, $message->user_id, $message->content);
            }
        }

        return response()->json(['messages' => $list]);
    }

    public function rateAdviser(Request $request){
        $inputs = $request->input();
        $adviseeID;
        $adviserID;

        $category = Category::where('name', $inputs['category_name'])->first();
        $adviserType = User_Types::where('user_id', $inputs['adviser_id'], 'category_id', $category->id)->first();
    }
}
