<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserType;
use App\Conversation;
use App\Category;
use App\User;
use App\Message;

use Auth;
use Redirect;

class MatchingController extends ConversationsController
{

    public function index($categoryName){
        $category = Category::where('name', $categoryName)->first();

        return view('message', ['categoryID' => $category['id'], 'categoryName' => $categoryName]);
    }

    public function getAdviser(Request $request){
        $inputs = $request->input();

        //Matching to Adviser
        $results = UserType::where('category_id', $inputs['categoryID'])->orderBy('rating', 'desc')->limit(5)->get();
        $advisers = array();
        foreach ($results as $result) {
            $adviser = User::where('id', $result->user_id)->first();
            array_push($advisers, $adviser);
        }
        //$adviser = $advisers[rand(0, 4)];
        $adviser = $advisers[0];

        $content = $inputs['content'];
        $adviserID = $adviser->id;

        //Creating Conversation
        $conversation = new Conversation;
        $conversation->advisee_id = Auth::id();
        //$conversation->adviser_id = User::find($adviserID)->id;
        $conversation->adviser_id = $adviserID;
        $conversation->save();

        //var_dump($conversation->adviser_id);

        $message = new Message;
        $message->user_id = Auth::id();
        $message->content = $content;
        $message->conversation_id = $conversation->id;
        $message->save();

        //$returnedarr = app('App\Http\Controllers\ConversationsController')->retrieveMessages($this->categoryName, $conversation->adviser_id);

        //return view('conversation', ['advisee_name' => returnedarr[0], 'adviser_name' => returnedarr[1], 'messages' => returned[2]]);

        //$this->retrieveMessages($this->categoryName, $conversation->adviser_id);
        return Redirect::route('conversations', array('categoryName' => $inputs['categoryName'], 'userID' => $conversation->adviser_id));
    }
}
