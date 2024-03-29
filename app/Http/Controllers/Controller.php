<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function counts($user)
    {
        $count_surprises = $user->surprises()->count();
        $count_favorites = $user->favorites()->count();
        
        return [
            'count_surprises' => $count_surprises,
            'count_favorites' => $count_favorites,
        ];
    }
    
    public function surprise_counts($surprise)
    {
        $count_favorite_users = $surprise->favorite_users()->count();
        $count_want_users = $surprise->want_users()->count();
        
        return [
            'count_favorite_users' => $count_favorite_users,
            'count_want_users' => $count_want_users,
        ];
    }
}
