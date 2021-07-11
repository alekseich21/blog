<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['title', 'short_content', 'content', 'category_id', 'user_id', 'views'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
}
