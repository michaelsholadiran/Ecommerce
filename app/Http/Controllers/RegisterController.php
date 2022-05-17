<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->access_code;
        // return response()->json(['status'=>1,'notification'=>"Success"]);


        $this->validate($request, [
      'first' => 'required',
      'last' => 'required',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|confirmed',
      'password_confirmation' => 'required',
      'access_code' => 'required',
       ]);
        if ($request->access_code == "#michael124#$") {
            $user=new User();
            $user->first= $request->first ;
            $user->last= $request->last ;
            $user->email= $request->email;
            $user->phone= $request->phone;
            $user->password= Hash::make($request->password);

            $user->save();

            Auth::login($user);
            return response()->json(['status'=>1,'notification'=>"Success"]);
        } else {
            return response()->json(['status'=>0,'notification'=>"Access Denied"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
