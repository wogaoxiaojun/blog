@extends('layouts.default')

@section('content')


    <form action="{{route('user.update',$user->id)}}" method="post">
        @csrf @method('PUT')

        <div class="card">
            <div class="card-header text-success">
                用户修改
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <label for="">邮箱</label>
                        <input type="text" readonly class="form-control" name="email"  value="{{$user->email}}">
                    </div>
                    <label for="">昵称</label>
                    <input type="text" class="form-control" name="name" placeholder="请输入昵称" value="{{$user->name}}">
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
                <button type="submit" class="btn btn-success">修改</button>
            </div>
        </div>
    </form>

@endsection