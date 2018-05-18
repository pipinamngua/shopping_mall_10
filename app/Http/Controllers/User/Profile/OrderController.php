<?php

namespace App\Http\Controllers\User\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Order;
use App\Models\OrderDetail;
use Auth;
use Session;

class OrderController extends Controller
{
    public function index()
    {
        return view('user.profile.order');
    }

    public function getOrderDetail(Request $request)
    {
        try {
            $order = Order::findOrFail($request->order_id);
            
            return view('user.profile.orderdetail', compact('order'));
        } catch (ModelNotFoundException $e) {
            return view('admin.partials.404');
        }
    }
}
