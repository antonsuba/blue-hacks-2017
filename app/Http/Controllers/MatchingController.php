<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatchingController extends Controller
{
    //Laravel.generate.code();
    public function getAdviser(Request $request){
        $inputs = $request->input();

        $results = UserType::where('category_id', $inputs['categoryID'])->orderBy('rating', 'desc')->limit(5)->get();
        $advisers = [];
        foreach ($results as $result) {
            $adviser = User::where('id', $result->user_id);
            array_push($advisers, $adviser);
        }
        $adviser = $advisers[rand(0, 4)];

        return $adviser;
    }
}
