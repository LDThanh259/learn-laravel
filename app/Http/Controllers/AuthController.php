<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function checkLogin(Request $request)
    {
        $name = $request->input('name');
        $mssv = $request->input('mssv');

        if ($name == "thanhld" && $mssv == "0321067") {
            return redirect()
                ->route('product.index')
                ->with('success', 'Login successful!');
        } else {
            return "login failed";
        }
    }
    public function SignIn()
    {
        return view('signin');
    }

    public function CheckSignIn(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $repass = $request->input('repass');
        $mssv = $request->input('mssv');
        $lopmonhoc = $request->input('lopmonhoc');
        $gioitinh = $request->input('gioitinh');
        // Sample correct info: Hieulx, 123abc, 123abc, 26867, 67PM1, nam
        $correct_username = "thanhld";
        $correct_password = "thanhld";
        $correct_mssv = "0321067";
        $correct_lopmonhoc = "67PM1";
        $correct_gioitinh = "nam";

        if ($password !== $repass) {
             return "Đăng ký thất bại: Mật khẩu không trùng khớp";
        }

        if (
            $username === $correct_username &&
            $password === $correct_password &&
            $mssv === $correct_mssv &&
            $lopmonhoc === $correct_lopmonhoc &&
            $gioitinh === $correct_gioitinh
        ) {
            return "Đăng ký thành công!";
        } else {
             return "Đăng ký thất bại: Thông tin không chính xác";
        }
    }
    public function InputAge()
    {
        return view('input_age');
    }

    public function PostCheckAge(Request $request)
    {
        $age = $request->input('age');
        session(['age' => $age]);
        return redirect()->route('admin.dashboard');
    }
}



