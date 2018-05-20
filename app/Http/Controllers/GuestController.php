<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;

class GuestController extends Controller
{
    public function index()
    {   
        return view('home');
    }

    public function show(Product $product)
    {
        return view('user.products.productdetail', [
            'product' => $product,
        ]);
    }

    public function getProductsOfCategory(Request $request)
    {
        $products = Category::find($request->id)->products;
        
        return view('layouts.products.productlist', compact('products'));
    }

    public function checkout() 
    {
        return view('user.checkout');
    }
}
