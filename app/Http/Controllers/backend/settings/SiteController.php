<?php

namespace App\Http\Controllers\backend\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SiteSetting;

use Illuminate\Support\Facades\Artisan;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $setting=  SiteSetting::first();
        } catch (\Exception $e) {
            $setting= [];
        }


        return view('backend.settings.site', compact('setting'));
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
      'title' => 'required',
      'description' => 'required',
      'customer_support' => 'required',
      'favicon' => 'sometimes|required',
      'logo' => 'sometimes|required',
      'text_logo' => 'sometimes|required',

       ]);

        $favicon=$request->file('favicon');
        $logo=$request->file('logo');
        $text_logo=$request->file('text_logo');
        $site_setting=  SiteSetting::first();


        if ($request->hasFile('favicon')) {
            $faviconName =  'favicon.'.$favicon->extension();
            $favicon->move(public_path() . '/assets/frontend/images/', $faviconName);
        } else {
            $faviconName =  $site_setting->favicon;
        }

        if ($request->hasFile('logo')) {
            $logoName =  'logo.'.$logo->extension();
            $logo->move(public_path() . '/assets/frontend/images/', $logoName);
        } else {
            $logoName =  $site_setting->logo;
        }

        if ($request->hasFile('text_logo')) {
            $textLogoName =  'text-logo.'.$text_logo->extension();
            $text_logo->move(public_path() . '/assets/frontend/images/', $textLogoName);
        } else {
            $textLogoName =  $site_setting->text_logo;
        }

        $customer_support= explode(',', $request->customer_support);
        $id=  SiteSetting::first()->id??1;
        SiteSetting::updateOrCreate(
            ['id' => $id],
            ['title' => $request->title,
            'name' => $request->name,
            'description' => $request->description,
            'google_analytics' => $request->google_analytics,
            'facebook_pixel' => $request->facebook_pixel,
            'customer_support' => $customer_support,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'telegram' => $request->telegram,
            'favicon' => $faviconName,
            'logo' => $logoName,
            'text_logo' => $textLogoName,
            'get_user_location' => $request->get_user_location,
            'app_url' => $request->app_url,
          ]
        );


        return response()->json(['status'=>1,'notification'=>"Settings Saved"]);
    }


    public function optimize()
    {
        Artisan::call('config:cache');
        Artisan::call('optimize');
        Artisan::call('route:clear');
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
