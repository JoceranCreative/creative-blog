<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'user_id',
        //'tags',
        'category_id',
        'text'
    ];

    // regarder d'autres exemples de barre de recherche
    // public function scopeFilter($query, array $filters)
    // {
    //     if ($filters['tag'] ?? false) {
    //         $query->where('tags', 'like', '%' . request('tag') . '%');
    //     }

    //     if ($filters['search'] ?? false) {
    //         $query
    //             ->where('title', 'like', '%' . request('search') . '%')
    //             ->orWhere('tags', 'like', '%' . request('search') . '%');
    //     }
    // }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
