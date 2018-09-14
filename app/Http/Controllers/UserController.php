<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',
            ['only' =>'edit']);

        $this->middleware('guest',
            ['only'=>'create']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::paginate(6);
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user=$this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|email',
            'password'=>'required|min:5|confirmed'
        ]);

        $user['password'] = bcrypt($request->password);
        //用户保存
        User::create($user);
        //自动登录
        $status= Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
        if($status)
        {
            session()->flash('success','注册成功已为你自动跳转');
        }
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $this->authorize('update',$user);
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
        $this->validate($request,[
            'name'=>'required|min:3',
            'password'=>'confirmed'
        ]);
        $user = User::find($id);
     //   dd($user->toArray());

        $user->name=$request->name;

        if($request->password)
        {
            $user['password'] = bcrypt($request->password);
        }

        $user->save();

        //自动登录
        $status= Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
        if($status)
        {
            session()->flash('success','用户信息修改成功');
        }
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
