<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    //

    /**
     * Register a user
     */
    public function create(){
        return view('auth.register');
    }

    /**
     * Register user 
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|name',
            'email' => 'required|email',
            'password' => 'required|min:8|max:24|string',
            'password_confirmation' => 'required|min:8|max:24|string',
        ]);
    }
}
