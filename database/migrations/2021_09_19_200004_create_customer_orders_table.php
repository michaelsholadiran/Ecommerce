<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('first');
            $table->string('last');
            $table->string('phone');
            $table->string('country');
            $table->string('postcode');
            $table->string('state');
            $table->string('city');
            $table->string('apartment');
            $table->string('company');
            $table->integer('order_id')->nullable();
            $table->integer('fulfilled');
            $table->integer('paid');
            $table->longText('address');
            // $table->integer('customer_id');
            // $table->integer('order_id');
            $table->integer('discount')->nullable();
            $table->integer('tax')->nullable();
            $table->string('total_price');

            $table->longText('note')->nullable();
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
        Schema::dropIfExists('customer_orders');
    }
}
