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
        $surprise = new Surprise;
        
        return view('surprises.create', [
            'surprise' => $surprise,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'reaction' => 'required|max:191',
            'budget' => 'required|numeric',
            'target' => 'required|max:191',
            'content' => 'required|max:1500'
        ]);
        
        $icon = '';
        switch($request->reaction) {
            case '手ごたえあり':
                $icon = 'fa-grin-squint';
                break;
            case 'まずまず':
                $icon = 'fa-smile';
                break;
            case '失敗した':
                $icon = 'fa-grin-beam-sweat';
                break;
            default:
                $icon = 'fa-question-circle';
        }
        
        $request->user()->surprises()->create([
            'title' => $request->title,
            'reaction' => $request->reaction,
            'icon' => $icon,
            'budget' => $request->budget,
            'target' => $request->target,
            'content' => $request->content,
        ]);
        
        return redirect('/')->with('flash_success', '投稿が完了しました');
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
        
        $data = [
            'surprise' =>$surprise
        ];
        
        $data += $this->surprise_counts($surprise);
        
        return view('surprises.show', $data);
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
        
        $icon = '';
        switch($request->reaction) {
            case '手ごたえあり':
                $icon = 'fa-grin-squint';
                break;
            case 'まずまず':
                $icon = 'fa-smile';
                break;
            case '失敗した':
                $icon = 'fa-grin-beam-sweat';
                break;
            default:
                $icon = 'fa-question-circle';
        }
        
        $surprise->title = $request->title;
        $surprise->reaction = $request->reaction;
        $surprise->icon = $icon;
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
