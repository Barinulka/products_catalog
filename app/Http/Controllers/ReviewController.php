<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\ReviewImage;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {

        $return = [
            'errors' => 0,
            'message' => 'ok'
        ];

        $this->validate($request, [
            'name' => 'required|min:3|max:100',
            'message' => 'required|min:3',
            'images' => 'nullable'
        ]);

        $folder = 'review/' . date('Y-m-d');
        $allowedFileExtension = ['jpg', 'jpeg', 'png'];
        $images = [];

        if ($request->hasFile('images')) {
            $images = $request->file('images');

            if (count($images) > 3) {
                $return['errors'] = 1;
                $return['message'] = 'Не более 3 картинок';
            }

            foreach ($images as $img) {
                $check = in_array($img->getClientOriginalExtension(), $allowedFileExtension);

                if (!$check) {
                    $return['errors'] = 2;
                    $return['message'] = 'Допускается загружать файлы с расширением jpg, jpeg, png';
                    break;
                } 
            }

            if ($return['errors'] > 0) {
                return response()->json([
                    'errors' => ['images' => $return['message']],
                    'message' => $return['message'],
                ], 422);
            }

            
        }

        $review = new Review();
        $review->name = $request->name;
        $review->message = $request->message;
        $review->user_id = 0;
        $review->good_id = $request->good_id;

        if (auth()->user()) {
            $review->user_id = auth()->user()->id; 
        }

        $review->save();

        if ($review->save()) {

            if (count($images) > 0) {
                foreach ($images as $img) {
                    $image = $img->store("images/{$folder}");
                    $reviewImage = new ReviewImage();
                    $reviewImage->review_id = $review->id;
                    $reviewImage->image = $image;
                    $reviewImage->save();
                }
            }

        }

        return response()->json([
            'message' => 'ok',
        ]);
    }
}
