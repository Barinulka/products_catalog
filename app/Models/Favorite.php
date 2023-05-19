<?php

namespace App\Models;

use App\Models\Good;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favorite extends Model
{
    use HasFactory;

    public function good() 
    {
        return $this->belongsTo(Good::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }


    public static function count()
    {
        $items = 0; 

        if (auth()->user()) {
            $items = self::where('user_id', auth()->user()->id)->count();
        }

        return $items;
    }
}
