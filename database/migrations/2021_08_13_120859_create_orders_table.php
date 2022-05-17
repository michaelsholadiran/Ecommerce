<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            // $table->integer('customer_id');
            // $table->string('email');
            // $table->string('name');
            // $table->string('phone');
            // $table->integer('paid');
            $table->integer('order_id');
            // $table->integer('fulfilled');
            $table->integer('price');
            $table->integer('quantity');
            // $table->integer('size');
            $table->string('color');
            $table->string('image');
            // $table->integer('size');
            // $table->string('country');
            // $table->string('state');
            // $table->longText('order');
            // $table->longText('address');
            // $table->longText('message');
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
        Schema::dropIfExists('orders');
    }
}
