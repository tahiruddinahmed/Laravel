<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    //

    public function create(){
        return view('auth.login');
    }

    public function login(Request $request) {
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'login' => 'invalid credentials'
            ]);
        }

        // create a session
        $request->session()->regenerate();

        // redirect 
        return redirect()->route('index');

    }


    /**
     * Logout user
     */
    public function destroy() {
        Auth::logout();

        return redirect()->route('index');
    }
}
