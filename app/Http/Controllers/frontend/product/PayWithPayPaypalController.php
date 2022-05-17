<?php

namespace App\Http\Controllers\frontend\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\custom_classes\PayPal;

class PayWithPayPaypalController extends Controller
{
    public function createOrder()
    {
        return Paypal::createOrder();
    }
    public function paypalReturn()
    {
        return Paypal::paypalReturn();
    }
}
