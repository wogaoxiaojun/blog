<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public  function login()
    {
        return view('user.login');
    }

    public function  authlogin(Request $request)
    {

        $user =  $this->validate($request,[
           'email'=>'required|email',
           'password'=>'required|min:5'
        ]);

        if(Auth::attempt($user))   //['email'=>$request->email,'password'=>$request->password]
        {
            session()->flash('success','登录成功');
            return redirect('/');
        }
        else
        {
            session()->flash('danger','用户名或密码错误，请检查');
            return redirect()->back()->withInput();
        }
    }
    //
    public  function logout()
    {
        \Auth::logout();
        session()->flash('success','退出成功');
        return redirect('/');
    }
}
