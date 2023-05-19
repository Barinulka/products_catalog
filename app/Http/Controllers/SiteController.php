<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Models\Review;
use App\Models\Category;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    public function index() 
    {
        $title = 'Home Page Title';


        // $reviews = Category::selectRaw('r.good_id, count(r.id) as count')->join('reviews as r', 'r.good_id', '=', 'categories.id')->groupBy('good_id')->having('count', '>', 1)->get();
        // $cats = DB::table('categories as cat')->selectRaw('r.good_id, count(r.id) as count, cat.id')->join('reviews as r', 'r.good_id', '=', 'cat.id')->groupBy('good_id')->having('count', '>', 1)->get();
        $categories = Category::selectRaw('r.good_id, count(r.id) as count, categories.id, categories.url, categories.name')
            ->join('reviews as r', 'r.good_id', '=', 'categories.id')
            ->groupBy('good_id')
            ->orderBy('count', 'desc')
            ->having('count', '>', 1)
            ->get();


        return view('home', compact('title', 'categories'));
    }

    public function show(string $url) 
    {
        $title = 'Category page';
        $category = Category::with('goods')->where('url', $url)->firstOrFail();
        $goods = $category->goods;

        if (app()->request->ajax()) {
            return view('item', compact('goods', 'category'));
        }

        return view('category', compact('title', 'category', 'goods'));
    }
}
