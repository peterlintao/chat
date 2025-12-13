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
                    <a class="btn {{request('order')!='recent'?'active':''}} text-decoration-none"
                       href="{{Request::url()}}?order=default">最后评论</a>
                    <a  class="btn {{request('order')=='recent'?'active':''}} text-decoration-none"
                       href="{{Request::url()}}?order=recent">最新发帖</a>
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
