<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    //
    protected $fillable = ['title', 'content', 'categories_id', 'user_id'];

    // relationships 
    
    // A post belongs to a user 
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    // a post belongs to a category 
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
