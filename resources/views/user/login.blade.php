@extends('layouts.default')

@section('content')


    <form action="{{route('login')}}" method="post">
        @csrf

        <div class="card">
            <div class="card-header text-success">
                用户登录
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">邮箱</label>
                    <input type="text" class="form-control" name="email" placeholder="请输入注册邮箱" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label for="">密码</label>
                    <input type="password" class="form-control" name="password" placeholder="请输入密码">
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-success">登录</button>
            </div>
        </div>
    </form>

@endsection