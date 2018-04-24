<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionController extends Controller
{
    public function create() {
        return view('session.create');
    }

    public function store(Request $request) {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;
        // Auth::attempt(['email' => $email, 'password' => $password])     ==     Auth::attempt($credentials)
        // attempt(param1, param2) param1表示【为需要进行用户身份认证的数组】， param2表示【是否为用户开启『记住我』功能的布尔值】
        if(Auth::attempt($credentials, $request->has('remember'))) {
            //处理登录成功
            session()->flash('success', '登录成功，欢迎回来');
            return redirect()->route('home');
        } else {
        //     //处理登录失败
            session()->flash('danger', '您的邮箱和密码不匹配');
            return redirect()->back();
        }
    }

    public function destroy() {
        Auth::logout();
        session()->flash('success', '您已成功退出');
        return redirect('login');
    }
}
