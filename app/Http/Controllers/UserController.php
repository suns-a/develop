<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $name = 'abe';
        $users = array(
            "name" => "tanaka",
            "email" => "tanaka@gmail.com",
            "phone" => "123456789"
        );
        return view('user', compact('name', 'users'));
    }
}
