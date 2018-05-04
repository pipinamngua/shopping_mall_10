<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountDetail extends Model
{
    protected $fillable = [
    	'discount_id',
    	'product_id',
    ];
}
