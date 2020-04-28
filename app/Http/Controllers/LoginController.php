<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * 处理身份认证尝试.
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $account = $request->input('account');
        $password = $request->input('password');
        $user = DB::table('users')->where('account', $account)->first();

        if (Auth::attempt(['account' => $account, 'password' => $password])) {
            // 认证通过...
            return response()->json([
                'msg' => 'success',
                'id' => $user->id,
                'account' => $user->account,
                'avatar' => $user->avatar,
                'name' => $user->name,
                'college' => $user->college,
                'class' => $user->class,
                'gra_year' => $user->gra_year,
                'ero_year' => $user->ero_year,
                'phone' => $user->phone,
                'email' => $user->email,
                'age' => $user->age,
                'gender' => $user->gender,
                'city' => $user->city,
                'profession' => $user->profession,
            ]);
        }
        else{
            return response()->json(['msg' => 'failed' , 'account' => $account]);
        }
    }
}
