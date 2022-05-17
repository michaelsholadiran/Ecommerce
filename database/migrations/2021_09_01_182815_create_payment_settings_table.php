<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_settings', function (Blueprint $table) {
            $table->id();
            $table->string('store_currency')->nullable();
            $table->string('paypal_active')->nullable();
            $table->string('paypal_currency')->nullable();
            $table->string('paypal_mode')->nullable();
            $table->string('client_id_sandbox')->nullable();
            $table->string('secret_id_sandbox')->nullable();
            $table->string('client_id_production')->nullable();
            $table->string('secret_id_production')->nullable();
            $table->string('stripe_active')->nullable();
            $table->string('stripe_currency')->nullable();
            $table->string('test_mode')->nullable();
            $table->string('test_secret_key')->nullable();
            $table->string('test_public_key')->nullable();
            $table->string('live_secret_key')->nullable();
            $table->string('live_public_key')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_settings');
    }
}
