<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'name',
        'start',
        'end',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'discount_details', 'discount_id', 'product_id');
    }
}
