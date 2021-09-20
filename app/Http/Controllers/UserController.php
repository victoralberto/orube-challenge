<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check() === false) {
            return redirect()->route('login');
        }

        $users = User::all();

        return view('users.users', [
            'users' => $users,
            'user_login' => Auth::user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check() === false) {
            return redirect()->route('login');
        }

        return view('users.create', [
            'user_login' => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            return redirect()->route('user.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        if (Auth::check() === false) {
            return redirect()->route('login');
        }

        return view('users.show', [
            'user' => $user,
            'user_login' => Auth::user()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        if (Auth::check() === false) {
            return redirect()->route('login');
        }

        return view('users.edit', [
            "user" => $user,
            "user_login" => Auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        if ($request->password != "") {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            if ($user->save()) {
                return redirect()->route('user.index');
            }
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($user->save()) {
            return redirect()->route('user.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->route('user.index');
    }
}
