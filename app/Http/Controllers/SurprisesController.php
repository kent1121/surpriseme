<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Surprise;
use App\User;

class SurprisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surprises = Surprise::orderBy('created_at', 'desc')->paginate(6);
        
        return view('welcome', [
            'surprises' => $surprises,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $surprise = Surprise::find($id);
        
        return view('surprises.show', [
            'surprise' => $surprise,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $surprise = Surprise::find($id);
        
        if (\Auth::id() === $surprise->user_id) {
            return view('surprises.edit', [
                'surprise' => $surprise
            ]);
        } else {
            return redirect('/')->with('flash_danger', 'アクセス権限がありません');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'reaction' => 'required|max:191',
            'budget' => 'required|numeric',
            'target' => 'required|max:191',
            'content' => 'required|max:1500'
        ]);
        
        $surprise = Surprise::find($id);
        
        $surprise->title = $request->title;
        $surprise->reaction = $request->reaction;
        $surprise->budget = $request->budget;
        $surprise->target = $request->target;
        $surprise->content = $request->content;
        
        $surprise->save();
        
        session()->flash('flash_success', '投稿を更新しました');
        
        return redirect()->route('surprises.show', ['id' => $surprise->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surprise = Surprise::find($id);
        
        if (\Auth::id() === $surprise->user_id) {
            $surprise->delete();
        } else {
            return redirect('/')->with('flash_danger', 'アクセス権限がありません');
        }
        
        return redirect('/')->with('flash_danger', '投稿を削除しました');
    }
}
