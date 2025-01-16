<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller

{
    public function userpage()
    {
        $users = User::all();
        return view('workuser', compact('users'));
    }
}
