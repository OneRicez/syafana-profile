<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','content','image','category','status','author'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'  // Generate slug dari title
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function comments(): HasMany{
        return $this->hasMany(Comment::class, 'news_id', 'id');
    }
}
