<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Auth;

class CommentController extends Controller
{
    public function store(Request $request){
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->product_id = $request->id;
        $comment->content = $request->content;
        $comment->rate = $request->rate != null ? $request->rate : 0;
        $comment->save();

        return back();
    }
}
