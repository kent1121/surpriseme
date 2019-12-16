<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surprise extends Model
{
    protected $fillable = ['user_id', 'title', 'reaction', 'icon', 'content', 'image', 'budget', 'target'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function favorite_users()
    {
        return $this->belongsToMany(User::class, 'favorites', 'surprise_id', 'user_id')->withTimestamps();
    }
}
