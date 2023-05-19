<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory;
    use HasSlug;

    public function goods() 
    {
        return $this->hasMany(Good::class);
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

    public function scopeLike($query, $search)
    {
        return $query->where('name', 'LIKE', "%{$search}%");
    }
}
