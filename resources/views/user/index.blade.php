@extends('layouts.default')
@section('content')

    <div class="card">
        <div class="card-header">
           用户列表
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>昵称</th>
                    <th width="120">操作</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($users as $user)
                        <tr>
                    <td scope="row">{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-danger">删除</button>
                            <button type="button" class="btn btn-secondary">查看</button>
                        </div>
                    </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
           {{$users->links()}}
        </div>
    </div>



@endsection
