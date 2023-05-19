<?php

namespace App\Models;

use App\Models\Review;
use App\Models\Favorite;
use Spatie\Sluggable\HasSlug;

use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin Builder
 */
class Good extends Model
{
    use HasFactory;
    use HasSlug;

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function isDraft() 
    {
        $result = 'Нет';

        if ($this->is_published) {
            $result = 'Да';
        }

        return $result;
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name') // Откуда берём имя урла
            ->saveSlugsTo('url'); // в какое поле записываем
    }

    public function favorite() 
    {
        return $this->hasOne(Favorite::class);
    }

    public function hasFavorite() 
    {

        $favorite = Favorite::with('good')->where('user_id', auth()->user()->id)->where('good_id', $this->id)->count();

        if ($favorite > 0) {
            return true;
        }

        return false;
    }

    public function reviews() 
    {
        return $this->hasMany(Review::class);
    }

    public function scopeLike($query, $search)
    {
        return $query->where('name', 'LIKE', "%{$search}%");
    }

}
