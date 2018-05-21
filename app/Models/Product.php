<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'supplier_id',
        'price_in',
        'price_out',
        'description',
        'quantity',
        'status',
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

    public function scopeProductListSort($query, $sort, $cate)
    {
        if ($sort == 1) {
            return $query->where('category_id', $cate)->orderByRaw('price_out ASC')->get();
        } elseif ($sort == 2) {
            return $query->where('category_id', $cate)->orderByRaw('price_out DESC')->get();
        } else {
            return $query->where('category_id', $cate)->get();
        }
    }
}
