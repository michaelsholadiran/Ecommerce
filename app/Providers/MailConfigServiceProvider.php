<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use App\Models\SMTPSetting;
use App\Models\SiteSetting;

class MailConfigServiceProvider extends ServiceProvider
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
            $emailServices = SMTPSetting::first();

            if ($emailServices) {
                $config = array(
              'transport' => 'smtp',
               'host'       => $emailServices->host,
               'port'       => $emailServices->port,
               'username'   => $emailServices->username,
               'password'   => $emailServices->password,
               'encryption' =>  $emailServices->secure,
               'timeout' => null,
               'auth_mode' => null
           );

                config(['mail.mailers.smtp' => $config]);
                config(['mail.from' =>  array('address' => $emailServices->email, 'name' => $emailServices->name)]);
            }
        } catch (\Exception $e) {
        }

        try {
            config(['app.name' =>  SiteSetting::first()->name]);
        } catch (\Exception $e) {
        }

        try {
            if (SiteSetting::first()->get_user_location == 1) {
                $stat="true";
            } else {
                $stat="false";
            }
            config(['location.testing.enabled' =>  $stat]);
        } catch (\Exception $e) {
        }

        try {
            config(['app.url' =>  SiteSetting::first()->app_url]);
        } catch (\Exception $e) {
        }
    }
}
