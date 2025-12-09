@extends('layouts.app')

@section('title',$user->name.'的个人空间')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <img src="{{$user->avatar}}" class="img-fluid rounded" alt="avatar">
                <div class="card-body">
                    <p class="text-center text-muted mb-1"><i class="fa-solid fa-user-tie"></i>用户名</p>
                    <h5 class="text-center text-success">{{$user->name}}</h5>
                    <hr>
                    <p class="text-center text-muted mb-1"><i class="fa-solid fa-clipboard"></i>用户简介</p>
                    <h5 class="text-center text-success">{{$user->introduction??'暂无信息'}}</h5>
                    <hr>
                    <p class="text-center text-muted mb-1"><i class="fa-solid fa-clock"></i>注册时间</p>
                    <h5 class="text-center text-success">{{$user->created_at->diffForHumans()}}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">{{$user->name}}--{{$user->email}}</h1>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h1 class="card-title">{{$user->introduction??'这个人很懒，什么都没有写'}}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
