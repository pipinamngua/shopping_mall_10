<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'supplier_id',
        'price_in',
        'price_out',
        'description',
        'quanlity',
        'status',
        'comments',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function reviews()
    {
        return $this->hasMany(Comment::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details', 'product_id', 'order_id');
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class, 'discount_details', 'product_id', 'discount_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'comments', 'product_id', 'user_id');
    }

    public static function getProducts()
    {
        return static::all();
    }
}
