<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3|max:100',
            'message' => 'required',
        ]);

        $review = new Review();
        $review->name = $request->name;
        $review->message = $request->message;
        $review->user_id = 0;
        $review->good_id = $request->good_id;

        if (auth()->user()) {
            $review->user_id = auth()->user()->id; 
        }

        $review->save();

        return response()->json([
            'message' => 'ok',
        ]);
    }
}
