<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WantsController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->want($id);
        return back();
    }
    
    public function destroy($id)
    {
        \Auth::user()->not_want($id);
        return back();
    }
}
