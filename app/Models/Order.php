<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'address',
        'message',
        'status',
        'payment',
        'subtotal',
        'endtotal',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details', 'order_id', 'product_id');
    }
}
