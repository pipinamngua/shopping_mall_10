<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use App\Models\Product;
use Cart;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::content();
        $count = 0;

        return view('user.cart.cart', ['cart' => $cart, 'count' => $count]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_id = $request->product_id;
        $product = Product::findOrFail($product_id);
        $image_main = $product->images->where('main_image', 1);

        if (!empty($image_main) && isset($main_image)) {
            $url =  $image_main[0]->url;
        } else {
            $url = config('custom.product.image');
        }
        $cartInfo = [
            'id' => $product_id,
            'name' => $product->name,
            'price' => $product->price_out,
            'qty' => '1',
            'options' => ['image' => $url]
        ];
        Cart::add($cartInfo);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $rowId = $request->rowId;
        Cart::remove($rowId);

        return back();
    }

    public function destroyCart()
    {
        Cart::destroy();

        return redirect()->route('home');
    }
    public function incrementQty(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($request->qty < $product->quantity) {
            $rowId = $request->rowId;
            Cart::update($rowId, $request->qty + 1);
        } else {
            Session::flash('fail', trans('custom.cart.failIncre'));
        }
        
        return back();
    }

    public function decrementQty(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($request->qty >1) {
            $rowId = $request->rowId;
            Cart::update($rowId, $request->qty - 1);
        } else {
            Session::flash('fail', trans('custom.cart.failDecre'));
        }
        
        return back();
    }
}
