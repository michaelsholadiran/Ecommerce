<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSetting extends Model
{
    use HasFactory;
    protected $fillable=['store_currency',
          'paypal_active',
          'paypal_currency',
          'paypal_mode',
          'client_id_sandbox',
          'secret_id_sandbox',
          'client_id_production',
          'secret_id_production',
          'stripe_active',
          'stripe_currency',
          'test_mode',
          'test_secret_key',
          'test_public_key',
          'live_secret_key',
          'live_public_key'];
}
