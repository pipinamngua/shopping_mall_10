<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $categories= Category::find($product->id);
        if($categories) {
            $productlist = $categories->products;
        }

        $products = Product::find($product->id);
        if($products) {
            $comments = $products->reviews;
            $comments = $comments->sort();
            if(count($comments) > 10){
                $comments = $comments->take(10);
            }
            foreach ($comments as $comment) {
                $users[$comment->id] = Comment::find($comment->id)->user;
            }
        }
        
        return view('user.products.productdetail', compact('product', 'productlist','comments', 'users'));
    } 
}
