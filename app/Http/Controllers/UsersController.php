<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //创建用户方法返回create页面
    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'account' => 'required|unique:users|min:9|max:15',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'account' => $request->account,
            'password' => bcrypt($request->password),
        ]);
        session()->flash('success', '用户创建成功！');
        return redirect()->route('users.show', [$user]);
    }
}
