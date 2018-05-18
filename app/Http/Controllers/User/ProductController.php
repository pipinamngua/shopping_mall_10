<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $productlist = Category::find($product->id)->products;
        
        return view('user.products.productdetail', compact([
        	'product',
        	'productlist',
        ]));
    } 
}
