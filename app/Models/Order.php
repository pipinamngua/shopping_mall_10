<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;

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

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeChangeStatus($query, $status, $id)
    {
        return $query->find($id)->update(['status' => $status]);
    }

    public function scopeDeleteOrder($query, $id)
    {
        OrderDetail::where('order_id', $id)->delete();
        return $query->find($id)->delete();
    }
}
