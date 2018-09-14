@extends('layouts.default')

@section('content')


    <form action="{{route('user.store')}}" method="post">
        @csrf

    <div class="card">
        <div class="card-header text-success">
            用户注册
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">昵称</label>
                <input type="text" class="form-control" name="name" placeholder="请输入昵称" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="">邮箱</label>
                <input type="text" class="form-control" name="email" placeholder="请输入注册邮箱" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label for="">密码</label>
                <input type="password" class="form-control" name="password" placeholder="请输入密码">
            </div>
            <div class="form-group">
                <label for="">密码确认</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="请再次输入密码">
            </div>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-success">注册</button>
        </div>
    </div>
    </form>

@endsection