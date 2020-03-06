<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth,Hash,Redirect;

class NhanVienController extends Controller
{
    public function getLogin()
    {
    	return view('users.login');
    }

    public function postLogin(Request $request)
    {
    	
        $login = array(
            'email' => $request->email,
            'password' => $request->password
        );
        if (Auth::guard('reception')->attempt($login)) {
            return redirect()->route('trangchu');
        }
        else{
            return redirect::back()->withErrors(['Đăng nhập không thành công', 'Kiểm tra lại username hoặc password .']);
        }
    }

    public function getLogout()
    {
        Auth::guard('reception')->logout();
        return redirect()->route('getLogin');
    }
}
