<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ["product_id", "customer_id", "paid","price", "quantity", "message", "image", "color", "order_id"];
    use HasFactory;


    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
