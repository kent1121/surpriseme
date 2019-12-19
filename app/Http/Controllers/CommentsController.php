<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Surprise;

class CommentsController extends Controller
{
    public function store(Request $request, $id)
    {
        $comment = new Comment;
        $user = \Auth::user();
        $surprise = Surprise::find($id);
        
        $comment->user_id = $user->id;
        $comment->surprise_id = $surprise->id;
        $comment->comment = $request->comment;
        $comment->save();
        
        return back();
    }
    
    public function destroy($id)
    {
        $comment = Comment::find($id);
        if (\Auth::id() === $comment->user_id) {
            $comment->delete();
        }
        
        return back();
    }
}
