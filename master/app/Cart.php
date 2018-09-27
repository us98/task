<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "cart";

    protected $fillable = [
    	'price',
    	'user_id',
    	'product_id'
    ];
}
