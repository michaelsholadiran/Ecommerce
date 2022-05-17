<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

// use Stevebauman\Location\Facades\Location;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if ($position = Location::get()) {
        //     $country=$position->countryName;
        // } else {
        //     $country='Unknown';
        // }
        return view('backend.profile');
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
        //
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
    public function update(Request $request)
    {
        $id=auth()->user()->id;
        $this->validate($request, [
      'first' => 'required',
      'last' => 'required',
      'phone' => 'required',
      'email' => 'required|email|unique:users,email,'.auth()->user()->id
       ]);

        $user = User::find($id);
        $user->first= $request->first;
        $user->last= $request->last;
        $user->phone= $request->phone;
        $user->email= $request->email;
        $user->save();

        return response()->json(['status'=>1,'notification'=>"Updated Successfully"]);
    }

    public function password_update(Request $request)
    {
        $id=auth()->user()->id;
        $this->validate($request, [
      'old_password' => 'required',
      'password' => 'required|confirmed',
      'password_confirmation' => 'required',
      // 'email' => 'required|email|unique:users,id,'.$id
       ]);

        if (Hash::check($request->old_password, auth()->user()->password)) {
            $user = User::find($id);
            $user->password=Hash::make($request->password);
            $user->save();
        } else {
            return response()->json(['status'=>0,'notification'=>"Please input your current password correctly"]);
        }

        return response()->json(['status'=>1,'notification'=>"Updated Successfully"]);
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
