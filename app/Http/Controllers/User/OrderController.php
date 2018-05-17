<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Session;
use DateTime;
use Cart;
use Auth;

class OrderController extends Controller
{
    public function create()
    {
        return view('user.cart.order');
    }

    public function store(Request $request)
    {
        $dataOrder = $request->only([
            'fullname',
            'email',
            'phone',
            'address',
            'subtotal',
            'endtotal',
            'payment',
            'message',
            'credit_card'
        ]);
        $order = $this->storeOrder($dataOrder);
        $order->save();

        foreach (Cart::content() as $item) {
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $item->id;
            $order_detail->quantity = $item->qty;
            $order_detail->price = $item->subtotal;
            $order_detail->created_at = new DateTime();
            $order_detail->updated_at = new DateTime();
            
            $order_detail->save();
        }

        Session::flash('success', trans('custom.order.success'));

        return redirect()->route('cart');
    }

    private function storeOrder(array $data)
    {
        $order = new Order();
        $order->fullname = $data['fullname'];
        $order->email = $data['email'];
        $order->phone = $data['phone'];
        $order->address = $data['address'];
        $order->subtotal = $data['subtotal'];
        $order->endtotal = $data['endtotal'];
        $order->status = config('custom.user.status');
        $order->message = $data['message'];

        if (Auth::check()) {
            $order->user_id = Auth::user()->id;
        } else {
            $order->user_id = config('custom.user.user_id');
        }

        if ($data['payment'] == config('custom.order.homepayment')) {
            $order->payment = config('custom.order.payment');
        } elseif ($data['payment'] == config('custom.order.credit_card')) {
            $order->payment = $data['credit_card'];
        }

        $order->created_at = new DateTime();
        $order->updated_at = new DateTime();

        return $order;
    }
}
