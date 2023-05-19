<?php

namespace App\Models;

use App\Models\Good;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    public function good() 
    {
        return $this->belongsTo(Good::class);
    }
}
