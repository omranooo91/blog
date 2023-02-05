<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($id){
        $post = Post::with('category')->where('id',$id)->get();
        return view('post',compact('post'));
    }
}
