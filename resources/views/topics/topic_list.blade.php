@if(count($topics))
    <ul class="list-group">
        @foreach($topics as $topic)
            <li class="list-group-item border-0 border-bottom d-flex align-items-center">
                <a class="flex-shrink-0" href="{{route('users.show',$topic->user->id)}}">
                    <img src="{{$topic->user->avatar}}" width="50" class="img-thumbnail" alt="{{$topic->user->name}}">
                </a>
                <div class="flex-grow-1 mx-2 d-flex flex-column">
                    <a class="text-decoration-none text-success" href="{{route('topics.show',$topic)}}">{{$topic->title}}</a>
                    <small>
                        <a href="{{route('categories.show',$topic->category_id)}}" class="text-primary text-decoration-none" title="{{$topic->category->name}}">
                            <i class="fa-regular fa-folder-open text-secondary"></i>
                            {{$topic->category->name}}
                        </a>
                        <a href="{{route('users.show',$topic->user->id)}}" class="text-primary text-decoration-none mx-2">
                            <i class="fa-regular fa-user  text-secondary"></i>
                            {{$topic->user->name}}
                        </a>
                        <span class="text-primary text-decoration-none">
                            <i class="fa-regular fa-clock  text-secondary"></i>
                            {{$topic->created_at->diffForHumans()}}
                        </span>
                    </small>
                </div>
                <a class="badge my_link text-decoration-none text-bg-{{$topic->reply_count>0?'danger':'secondary'}}" href="#">{{$topic->reply_count}}</a>
            </li>
        @endforeach
    </ul>
    {{-- 分页--}}
    <div class="pagination-container d-flex justify-content-center mt-3">
        {!! $topics->appends(Request::except('pages'))->render() !!}
    </div>
@else
    @include('shared._no_data',['info'=>'暂无帖子'])
@endif
