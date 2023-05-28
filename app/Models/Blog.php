<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) => $query->where('title', 'like', '%' . $search . '%')->orWhere('body', 'like', '%' . $search . '%'));

        $query->when($filters['category'] ?? false, fn ($query, $category) => $query->whereHas('category', fn ($query) => $query->where('slug', $category)));

        $query->when($filters['author'] ?? false, fn ($query, $author) => $query->whereHas('author', fn ($query) => $query->where('username', $author)));
    }


    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
