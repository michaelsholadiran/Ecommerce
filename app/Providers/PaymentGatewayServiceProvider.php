<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use App\Models\PaymentSetting;

class PaymentGatewayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            $payment =PaymentSetting::first();

            if ($payment) {
                $paypal_config = array(
             'paypal_mode' => $payment->paypal_mode,
             'client_id_production'       => $payment->client_id_production,
             'secret_id_production'       => $payment->secret_id_production,
             'client_id_sandbox'       => $payment->client_id_sandbox,
             'secret_id_sandbox'       => $payment->secret_id_sandbox,

         );

                $stripe_config = array(
              'test_mode' => $payment->test_mode,
              'live_public_key'       => $payment->live_public_key,
              'live_secret_key'       => $payment->live_secret_key,
              'test_public_key'       => $payment->test_public_key,
              'test_secret_key'       => $payment->test_secret_key,

          );

                config(['services.paypal' => $paypal_config]);
                config(['services.stripe' => $stripe_config]);
            }
        } catch (\Exception $e) {
        }
    }
}
