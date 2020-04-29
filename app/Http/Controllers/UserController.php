<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function show ($id)
    {
        return new UserResource(User::find($id));
    }
    //用户更新头像
    public function updateAvatar(Request $request)
    {
        $user_id = $request->input('user_id');
        $avatar = $request->input('avatar');
        DB::table('users')
            ->where('id', $user_id)
            ->update(['avatar' => $avatar]);
    }
    //用户更新资料
    public function updateInfo(Request $request)
    {
        $user_id = $request->input('user_id');
        $name = $request->input('name');
        $age = $request->input('age');
        $gra_year = $request->input('gra_year');
        $ero_year = $request->input('ero_year');
        $college = $request->input('college');
        $className = $request->input('className');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $city = $request->input('city');
        $profession = $request->input('profession');
        $gender = $request->input('gender');
        DB::table('users')
            ->where('id', $user_id)
            ->update([
                'name' => $name,
                'age' => $age,
                'gra_year' => $gra_year,
                'ero_year' => $ero_year,
                'college' => $college,
                'class' => $className,
                'phone' => $phone,
                'email' => $email,
                'city' => $city,
                'profession' => $profession,
                'gender' => $gender,
            ]);
    }
}
