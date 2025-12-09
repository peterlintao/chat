@extends('layouts.app')

@section('title',$user->name.'的个人编辑页面')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2 bg-success">
            <div class="card">
                <div class="card-header pt-3">
                    <h3><i class="fa-solid fa-pen-to-square"></i>编辑个人信息</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('users.update',$user)}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        @include('shared._errors')
                        <div class="mb-3">
                            <label for="name" class="form-label">用户名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="请输入用户名" value="{{old('name',$user->name)}}">
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">用户头像</label>
                            <input type="file" class="form-control" id="avatar" name="avatar">
                        </div>
                        @if($user->avatar)
                            <div class="mb-3">
                                <img style="width: 200px" src="{{$user->avatar}}" class="img-fluid rounded-start" alt="用户头像">
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="email" class="form-label">邮箱</label>
                            <input type="email" class="form-control" readonly id="email" name="email" value="{{old('email',$user->email)}}">
                        </div>
                        <div class="mb-3">
                            <label for="introduction" class="form-label">人个简介</label>
                            <textarea class="form-control" id="introduction" name="introduction" rows="6" style="resize: none">{{old('introduction',$user->introduction)}}</textarea>
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary me-3">确定</button>
                            <a href="{{route('users.show',$user)}}" class="btn btn-warning text-decoration-none">取消</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
