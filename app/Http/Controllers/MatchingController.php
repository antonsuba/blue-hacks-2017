<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserType;
use App\Conversation;
use App\Category;
use App\User;
use App\Message;

use Auth;

class MatchingController extends ConversationsController
{
    public $categoryName;

    public function index($categoryName){
        $this->categoryName = $categoryName;
        $category = Category::where('name', $categoryName)->first();

        return view('message', ['categoryID' => $category['id']]);
    }

    public function getAdviser(Request $request){
        $inputs = $request->input();

        $results = UserType::where('category_id', $inputs['categoryID'])->orderBy('rating', 'desc')->limit(5)->get();
        $advisers = array();
        foreach ($results as $result) {
            $adviser = User::where('id', $result->user_id)->first();
            array_push($advisers, $adviser);
        }
        //$adviser = $advisers[rand(0, 4)];
        $adviser = $advisers[0];

        //var_dump($adviser);

        $this->createPost($inputs['content'], $adviser->id);
    }

    public function createPost($content, $adviserID){
        $conversation = new Conversation;
        $conversation->advisee_id = Auth::id();
        $conversation->adviser_id = User::find($adviserID)->id;
        $conversation->save();

        $message = new Message();
        $message->user_id = Auth::id();
        $message->content = $content;
        $message->conversation_id = $conversation->id;
        $message->save();

        $this->retrieveMessages($this->categoryName, $conversation->adviser_id);
    }
}
