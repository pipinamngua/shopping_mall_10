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
        $newCategories = Category::orderBy('created_at')->where('parent_id', '!=', 0);
        if(!empty($newCategories) && isset($newCategories)){
            $firstProducts = $newCategories->first()->products;
            if ($newCategories->count() >= 4) {
                $newCategories = $newCategories->take(4)->get();
            } else {
                $newCategories = $newCategories->take($newCategories->count())->get();
            }
        }

        $newProducts = Product::where('status', 1)->paginate(config('custom.pagination.product_table'));

        return view('home', compact('newCategories', 'firstProducts', 'newProducts'));
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

    public function getProductList($id)
    {
        $category = Category::find($id);
        $products = $category->products;

        return view('user.products.product-list', compact('category', 'products'));
    }

    public function checkout()
    {
        return view('user.checkout');
    }

    public function getProductListSort($string)
    {
        $array = explode('-', $string);
        $category = $array[0];
        $sort = $array[1];
        $products = Product::productListSort($sort, $category);

        return view('user.cate.product-cate-sort', compact('products'));
    }
}
