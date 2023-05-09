<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Please enter your email!',
                'password.required' => 'Please enter your password!'
            ]
        );
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect('/');
        } else {
            return redirect('web.pages.home')->with('warning', "Sign in unsuccessfully!");
        }
    }

    public function movieDetail() {
        return view('web.pages.movieDetail');
    }

    public function  ticket() {
        return view('web.pages.ticket');
    }

}
