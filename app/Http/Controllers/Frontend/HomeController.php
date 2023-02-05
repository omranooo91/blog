<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliders = Post::with('category')->orderBy('id')->limit(5)->get();
        $allCategories = Category::with(['posts' => function ($query) {
            $query->latest()->limit(3);
        }])->get();

        return view('home',compact('sliders','allCategories'));
    }
}
