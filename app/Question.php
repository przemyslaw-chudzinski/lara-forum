<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'body',
        'category_id',
        'user_id'
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function replies()
    {
        return $this->hasMany(Reply::class);
    }

    function category()
    {
        return $this->belongsTo(Category::class);
    }
}
