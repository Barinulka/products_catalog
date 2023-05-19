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

        $categories = Category::selectRaw('count(r.id) as count, categories.id, categories.url, categories.name')
            ->join('goods as g', 'g.category_id', '=', 'categories.id')
            ->join('reviews as r', 'r.good_id', '=', 'g.id')
            ->groupBy('categories.id')
            ->orderBy('count', 'desc')
            ->havingRaw('count > 3')
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

    public function search(Request $request) 
    {
        $title = 'Результаты поиска';
        $results = [];

        $request->validate([
            'search' => 'required',
        ]);

        $search = $request->search;

        $categories = Category::selectRaw('id, name, url, "category" AS type')->like($search)->where('is_published', 1);
        

        $results = Good::selectRaw('id, name, url, "catalog" AS type')->like($search)->where('is_published', 1)->union($categories)->inRandomOrder()->paginate(10);

        return view('search', compact('title', 'results'));
    }

    
}
