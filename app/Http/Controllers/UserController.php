<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show ($id)
    {
        return new UserResource(User::find($id));
    }
    //用户更新头像
    public function updateAvatar(Request $request)
    {
        dd($request->avatar);
        $path = $request->file('avatar')->store('avatars');

        return $path;
    }
    //用户更新资料
    public function updateInfo(Request $request)
    {
        $user_id = $request->input('user_id');
        $age = $request->input('age');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $city = $request->input('city');
        $profession = $request->input('profession');
        $gender = $request->input('gender');
        DB::table('users')
            ->where('id', $user_id)
            ->update([
                'age' => $age,
                'phone' => $phone,
                'email' => $email,
                'city' => $city,
                'profession' => $profession,
                'gender' => $gender,
            ]);
    }
    //用户查找(根据name字段)
    public function search(Request $request)
    {
        $name = $request->input('name');
        return new UserCollection(
            User::where('name', $name)
                    ->orderBy('id')
                    ->get()
                );
    }
}
