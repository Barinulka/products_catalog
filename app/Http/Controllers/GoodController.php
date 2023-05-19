<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Models\Review;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    public function index() 
    {
        $title = 'Каталог товаров';

        $goods = Good::where('is_published', 1)->paginate(10);

        if (app()->request->ajax()) {
            return view('goods._items', compact('goods'));
        }

        return view('goods.index', compact('title', 'goods'));
    }

    public function show(string $url) 
    {
        $good = Good::with('reviews')->where('url', $url)->where('is_published', 1)->firstOrFail();

        $title = $good->name;

        $reviews = Review::where('good_id', $good->id)->orderBy('id', 'desc')->paginate(3);

        if (app()->request->ajax()) {
            return view('goods._reviews_lists', compact('reviews'));
        }

        return view('goods.view', compact('good', 'title', 'reviews'));
    }
}
