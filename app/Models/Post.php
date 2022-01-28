<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'user_id',
        'category_id',
        'excerpt',
        'body',
        'image'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query, $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) => $query->where('title', 'like', "%" . $search . "%")
        );

        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) => $query->whereHas(
                'category',
                fn ($query) => $query->where('slug', $category)
            )
        );

        $query->when(
            $filters['user'] ?? false,
            fn ($query, $user) => $query->whereHas(
                'user',
                fn ($query) => $query->where('username', $user)
            )
        );
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
