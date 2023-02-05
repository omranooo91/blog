<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::with('children')->where('parent',0)->get();
        return CategoryCollection::make($categories);

    }

    public function categgoryWithPosts()
    {
        $categories_with_posts = Category::with(['posts'=>function($query){
            $query->limit('2');
        }])->get();

        return new CategoryCollection($categories_with_posts);

    }
}
