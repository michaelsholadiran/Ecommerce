<?php

namespace App\Http\Controllers\backend\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PaymentSetting;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $setting=  PaymentSetting::first();
        } catch (\Exception $e) {
            $setting=  [];
        }



        return view('backend.settings.payment', compact('setting'));
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
        return $request->all();
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
    public function CurrencyUpdate(Request $request)
    {
        $this->validate($request, ['store_currency' => 'required']);

        $id=  PaymentSetting::first()->id??1;
        PaymentSetting::updateOrCreate(
            ['id' => $id],
            ['store_currency' => $request->store_currency]
        );

        return response()->json(['status'=>1,'notification'=>"Settings Saved"]);
    }


    public function PaypalUpdate(Request $request)
    {
        $this->validate($request, [
          'paypal_active' => 'required',
          'paypal_currency' => 'required',
          'client_id_sandbox' => 'required',
          'secret_id_sandbox' => 'required',
          'client_id_production' => 'required',
          'secret_id_production' => 'required',
          'paypal_mode' => 'required'
      ]);

        $id=  PaymentSetting::first()->id??1;
        PaymentSetting::updateOrCreate(
            ['id' => $id],
            [
              'paypal_active' => $request->paypal_active,
              'paypal_currency' => $request->paypal_currency,
              'client_id_sandbox' => $request->client_id_sandbox,
              'secret_id_sandbox' => $request->secret_id_sandbox,
              'client_id_production' => $request->client_id_production,
              'secret_id_production' => $request->secret_id_production,
              'paypal_mode' => $request->paypal_mode
          ]
        );


        return response()->json(['status'=>1,'notification'=>"Settings Saved"]);
    }


    public function StripeUpdate(Request $request)
    {
        $this->validate($request, [
          'stripe_active' => 'required',
          'stripe_currency' => 'required',
          'test_secret_key' => 'required',
          'test_public_key' => 'required',
          'live_secret_key' => 'required',
          'live_public_key' => 'required'

      ]);

        $id=  PaymentSetting::first()->id??1;
        PaymentSetting::updateOrCreate(
            ['id' => $id],
            [
              'stripe_active' => $request->stripe_active,
              'stripe_currency' => $request->stripe_currency,
              'test_mode' => $request->test_mode,
              'test_secret_key' => $request->test_secret_key,
              'test_public_key' => $request->test_public_key,
              'live_secret_key' => $request->live_secret_key,
              'live_public_key' => $request->live_public_key

          ]
        );


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
