<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    protected $fillable = [
        'customer_id', "email",
        "first",
        "last",
        "phone",
        "city",
        "apartment",
        "company",
        "country",
        "state",
        "postcode",
        "address",
        "note",
    ];
    use HasFactory;


    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'order_id');
    }

    public static function getOrders()
    {
        $orders=\DB::table('customer_orders')->where(['fulfilled'=>0,'paid'=>1])->select("order_id", "first", "total_price", "note")->get()->toArray();
        return $orders;
    }
}
