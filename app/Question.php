<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
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

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPathAttribute()
    {
        return url('api/questions/' . $this->slug);
    }
}
