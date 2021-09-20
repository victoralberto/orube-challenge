<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check() === true) {
            return redirect()->route('index');
        }

        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('index');
        }

        return redirect()->back()->withInput()->withErrors('Os dados utilizados não conferem!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
