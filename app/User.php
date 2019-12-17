<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'sex', 'age', 'profile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function surprises()
    {
        return $this->hasMany(Surprise::class);
    }
    
    public function favorites()
    {
        return $this->belongsToMany(Surprise::class, 'favorites', 'user_id', 'surprise_id')->withTimestamps();
    }
    
    public function is_favoriting($surpriseId)
    {
        return $this->favorites()->where('surprise_id', $surpriseId)->exists();
    }
    
    public function favorite($surpriseId)
    {
        $exist = $this->is_favoriting($surpriseId);
        
        if ($exist) {
            return false;
        } else {
            $this->favorites()->attach($surpriseId);
            return true;
        }
    }
    
    public function unfavorite($surpriseId)
    {
        $exist = $this->is_favoriting($surpriseId);
        
        if ($exist) {
            $this->favorites()->detach($surpriseId);
            return true;
        } else {
            return false;
        }
    }
    
    public function wants()
    {
        return $this->belongsToMany(Surprise::class, 'wants', 'user_id', 'surprise_id')->withTimestamps();
    }
    
    public function is_wanting($surpriseId)
    {
        return $this->wants()->where('surprise_id', $surpriseId)->exists();
    }
    
    public function want($surpriseId)
    {
        $exist = $this->is_wanting($surpriseId);
        
        if ($exist) {
            return false;
        } else {
            $this->wants()->attach($surpriseId);
            return true;
        }
    }
    
    public function not_want($surpriseId)
    {
        $exist = $this->is_wanting($surpriseId);
        
        if ($exist) {
            $this->wants()->detach($surpriseId);
            return true;
        } else {
            return false;
        }
    }
}
