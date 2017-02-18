<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show()
    {
        $user = Auth::user();
    }

    public function edit()
    {
        $user = Auth::user();
    }
}
