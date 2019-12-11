<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surprise extends Model
{
    protected $fillable = ['user_id', 'title', 'reaction', 'content', 'image', 'budget', 'target'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
