<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id){
        $categoryPage = Category::with(['posts' => function ($query) {
            $query->latest()->limit(3);
        }])->where('id',$id)->get();

;        return view('category',compact('categoryPage'));
    }
}
