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
    
    public function surprises_index($id)
    {
        $user = User::find($id);
        $surprises = $user->surprises()->orderBy('created_at', 'desc')->paginate(12);
        
        $data = [
            'user' => $user,
            'surprises' => $surprises,
        ];
        
        $data += $this->counts($user);
        
        return view('users.surprises_index', $data);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        
        $data = [
            'user' => $user
        ];
        
        $data += $this->counts($user);
        
        return view('users.show', $data);
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        
        if (\Auth::id() === $user->id) {
            return view('users.edit', [
                'user' => $user,
            ]);
        } else {
            return redirect('/')->with('flash_danger', 'アクセス権限がありません');
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
        }
        
        return redirect()->route('users.show', ['id' => $user->id]);
    }
    
    public function destroy_confirmation($id)
    {
        $user = User::find($id);
        
        if (\Auth::id() === $user->id) {
            return view('users.delete_confirmation', [
                'user' => $user,
            ]);
        } else {
            return redirect('/')->with('flash_danger', 'アクセス権限がありません');
        }
    }
    
    public function destroy($id)
    {
        $user = User::find($id);
        
        if (\Auth::id() === $user->id) {
            $user->delete();
        }
        
        return redirect('/');
    }
    
    public function favorites($id)
    {
        $user = User::find($id);
        $surprises = $user->favorites()->paginate(12);
        
        $data = [
            'user' => $user,
            'surprises' => $surprises,
        ];
        
        $data += $this->counts($user);
        
        return view('users.favorites', $data);
    }
}
