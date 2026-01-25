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
}
