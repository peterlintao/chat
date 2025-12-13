@extends('layouts.app')

@section('title','发布帖子')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2 bg-success">
            <div class="card">
                <div class="card-header pt-3">
                    <h3><i class="fa-solid fa-pen"></i>发布帖子</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('topics.store')}}" method="POST">
                        @csrf
                        @include('shared._errors')
                        <div class="mb-3">
                            <label for="title" class="form-label">帖子标题</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="请输入帖子标题" value="{{old('title')}}">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">所属分类</label>
                            <select class="form-select" name="category_id">
                                <option>请选择分类...</option>
                                @foreach(\App\Models\Category::all() as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">帖子内容</label>
                            <textarea class="form-control" id="content" name="content" rows="6" placeholder="请输入......" style="resize: none">{{old('content')}}</textarea>
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary me-3">确定</button>
                            <a href="{{}}" class="btn btn-warning text-decoration-none">取消</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
