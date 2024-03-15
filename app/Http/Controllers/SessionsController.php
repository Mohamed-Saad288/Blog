<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        return view('login.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (! auth()->attempt($attributes))
        {

            return back()
                ->withInput()
                ->withErrors(['email' => 'something wrong']);
        }
        session()->regenerate();
        return redirect('/')->with('success','welcome back!');
    }
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success','Good bye !');
    }

}
