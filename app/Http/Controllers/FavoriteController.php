<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Good;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index() 
    {
        $title = 'Избранные товары';
       
        $favorites = Favorite::with('good')->where('user_id', auth()->user()->id)->get();
        
        $goods = [];

        foreach ($favorites as $fav) {
            $goods[$fav->good->id] = $fav->good;
        }

        return view('favorite.index', compact('title', 'goods'));
    }

    public function add(Request $request, Good $good) 
    {
       
        if ($request->ajax()) {

            $model = new Favorite();
            $model->user_id = auth()->user()->id;
            $model->good_id = $good->id;
            $model->save();

            return response()->json(['message' => 'ok', 'count' => Favorite::count()]);
        }

        return response()->json('error');

    }

    public function remove(Request $request, Good $good) 
    {
       
        if ($request->ajax()) {
            
            $model = Favorite::where('good_id', $good->id);

            $model->delete();

            return response()->json(['message' => 'ok', 'count' => Favorite::count()]);
        }

        return response()->json('error');

    }
}
