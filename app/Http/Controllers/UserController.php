<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login()
    {

    }

    public function Handle_Login(Request $request)
    {
        $data = [
            'name' => $request->name,
            'password' => $request->password
        ];

        if(Auth::attempt($data)){
            return response()->json([
                'success' => true,
                'message' => 'Đăng nhập thành công'
            ]);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Đăng nhập không thành công'
            ]);
        }
    }

    public function Register()
    {

    }

    public function store(Request $request)
    {

        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'api_token' => Str::random(60),
        ]);

        if (empty($user)) {
            return response()->json([
                'success' => false,
                'message' => 'Tạo tài khoản thất bại'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Tạo tài khoản thành công'
        ]);
    }
}
