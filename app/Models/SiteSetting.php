<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
    protected $fillable=['title','description','name','favicon','logo','text_logo','google_analytics','facebook_pixel','facebook','instagram','twitter','customer_support','get_user_location','app_url','telegram'];

    protected $casts = [
        'customer_support' => 'array'
    ];
}
