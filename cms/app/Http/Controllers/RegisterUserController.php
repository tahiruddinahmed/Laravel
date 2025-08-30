<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

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
        // validate user input
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => ['required', Password::min(6)->letters()->numbers()->mixedCase()->symbols(), 'confirmed'], 

            // it will check for password_confirmation and check if it matches the password
        ]);
        // dd($attributes)
        // check if user already exits 
        $checkUser = User::where('email', $request->email)->first();

        if($checkUser) {
            throw ValidationException::withMessages([
                'email' => 'You already have an account'
            ]);
        }

        // Create user 
        $user = User::create($attributes);

        // logged the user 
        Auth::login($user);

        // redirect 

        return redirect()->route('index');
    }
}
