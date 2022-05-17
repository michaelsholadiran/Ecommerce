<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['title','description','price','compare_price','quantity','weight','size','color','seo_title','seo_description','images','url_slug','status'];
    protected $casts = [
        'images' => 'array'
    ];
}
