<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        if (Auth::attempt(['account' => $account, 'password' => $password])) {
            // 认证通过...
            return response()->json([
                'msg' => 'success',
                'account' => $account,
                'avatar' => $avatar,
                'name' => $name,
                'college' => $college,
                'class' => $class,
                'gra_year' => $gra_year,
                'ero_year' => $ero_year,
                'phone' => $phone,
                'email' => $email,
                'age' => $age,
                'gender' => $gender,
                'city' => $city,
                'profession' => $profession,
            ]);
        }
        else{
            return response()->json(['msg' => 'failed' , 'account' => $account]);
        }
    }
}
