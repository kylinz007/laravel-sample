<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionController extends Controller
{
    public function create() {
        return view('session.create');
    }

    /*
        构造函数
        过滤 未登录用户只能访问登录页面
    */
    public function __construct() {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
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
            //redirect() 实例提供了一个 intended 方法，该方法可将页面重定向到上一次请求尝试访问的页面上，并接收一个默认跳转地址参数，当上一次请求记录为空时，跳转到默认地址上
            return redirect()->intended(route('users.show', [Auth::user()]));
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
