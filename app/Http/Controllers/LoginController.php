<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
              'email' => ['required', 'email'],
              'password' => ['required'],
          ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return response()->json(['status'=>1,'notification'=>"Success"]);
            // return redirect()->intended('dashboard');
        }

        // return back()->withErrors([
        //       'email' => 'The provided credentials do not match our records.',
        //   ]);
        return response()->json(['status'=>0,'notification'=>"The provided credentials do not match our records."]);
        // return back()->withErrors([
        //       'email' => 'The provided credentials do not match our records.',
        //   ]);
    }
}
