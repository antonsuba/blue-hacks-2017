<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $name = $user->name;
        $email = $user->email;
        $celNumber = $user->cel_number;
        $income = $user->income;

        return view('user', ['name' => $name, 'email' => $email, 'celNumber' => $celNumber, 'income', $income]);
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
    }
}
