<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'short_content', 'content', 'category_id', 'user_id', 'views'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function commentss()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
}
