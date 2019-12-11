<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        
        return view('users.index',[
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        
        return view('users.show', [
            'user' => $user,
        ]);
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        
        if (\Auth::id() === $user->id) {
            return view('users.edit', [
                'user' => $user,
            ]);
        } else {
            return back()->with('flash_danger', 'アクセス権限がありません');
        }
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => ['required', 'string', 'email', 'max:191', Rule::unique('users')->ignore(\Auth::id())],
            // 'avatar' => '',
            'sex' => 'required|string|max:191',
            'age' => 'required|string|max:191',
            'profile' => 'max:500',
        ]);
        
        $user = User::find($id);
        
        if (\Auth::id() === $user->id) {
            $user->name = $request->name;
            $user->email = $request->email;
            // $user->avatar = $request->avatar;
            $user->sex = $request->sex;
            $user->age = $request->age;
            $user->profile = $request->profile;
            $user->save();
        } else {
            return back()->with('flash_danger', 'アクセス権限がありません');
        }
        
        return view('users.show',[
            'user' => $user
        ]);
    }
}
