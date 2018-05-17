<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'rate',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
