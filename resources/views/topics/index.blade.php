@extends('layouts.app')

@section('title',request()->routeIs('categories.show')?$category->name:'帖子列表')

@section('content')
    <div class="row">
        <div class="col-md-9">
            @if(request()->routeIs('categories.show'))
                <div class="alert alert-info" role="alert">
                    <i class="fa-solid fa-book"></i> {{$category->name}} : {{$category->description}}
                </div>
            @endif
            <div class="card">
                <div class="card-header bg-transparent">
                    <button type="button" class="btn active" data-bs-toggle="button">最后评论</button>
                    <button type="button" class="btn" data-bs-toggle="button" aria-pressed="true">最新发帖</button>
                </div>
                <div class="card-body">
                    @include('topics.topic_list',['topics'=>$topics])
                </div>
            </div>
        </div>
        <div class="col-md-3">
            @include('topics.sidebar')
        </div>
    </div>
@endsection
