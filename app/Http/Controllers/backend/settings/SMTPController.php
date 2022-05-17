<?php

namespace App\Http\Controllers\backend\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SMTPSetting;
    use Illuminate\Support\Facades\Artisan;

class SMTPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $setting=  SMTPSetting::first();
        } catch (\Exception $e) {
            $setting=  [];
        }
      

        return view('backend.settings.smtp', compact('setting'));
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
        $this->validate($request, [
      'name' => 'required',
    'host' => 'required',
    'port' => 'required',
    'secure' => 'required',
    'username' => 'required',

     ]);
        if ($request->password == "") {
            $password = SMTPSetting::first()->password??"";
        } else {
            $password=$request->password;
        }

        $id=  SMTPSetting::first()->id??1;
        SMTPSetting::updateOrCreate(
            ['id' => $id],
            ['name' => $request->name,
         'port' => $request->port,
         'host' => $request->host,
         'secure' => $request->secure,
         'username' => $request->username,
         'email' => $request->email,
         'password' => $password,

       ]
        );


        Artisan::call('config:cache');
        return response()->json(['status'=>1,'notification'=>"Settings Saved"]);
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
