<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store','index']
        ]);
    }

    //查看所有用户
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    //创建用户方法返回create页面
    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        $statuses = $user->statuses()
                           ->orderBy('created_at', 'desc')
                           ->paginate(10);
        return view('users.show', compact('user', 'statuses'));
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

        Auth::login($user);
        session()->flash('success', '用户创建成功！');
        return redirect()->route('users.show', [$user]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'name' => 'nullable',
            'age' => 'nullable',
            'gender' => 'nullable',
            'college' => 'nullable',
            'class' => 'nullable',
            'ero_year' => 'nullable',
            'gra_year' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable',
            'city' => 'nullable',
            'profession' => 'nullable',
        ]);

        $data = [];
        $data['name'] = $request->name;
        $data['age'] = $request->age;
        $data['gender'] = $request->gender;
        $data['college'] = $request->college;
        $data['class'] = $request->class;
        $data['ero_year'] = $request->ero_year;
        $data['gra_year'] = $request->gra_year;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['city'] = $request->city;
        $data['profession'] = $request->profession;

        $user->update($data);

        session()->flash('success', '个人资料更新成功！');

        return redirect()->route('users.show', $user);
    }

    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', '成功删除用户！');
        return back();
    }
}
