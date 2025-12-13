{{--@include('users._topics',['topics'=>$user->topics()->recent()->paginate(6)])--}}
@if(count($topics))
    <ul class="list-group mt-4">
        @foreach($topics as $topic)
            <li class="list-group-item border-0 border-bottom d-flex">
                <a class="flex-grow-1" href="{{route('topics.show',$topic)}}">{{$topic->title}}</a>
                <small class="text-nowrap ps-2">
                    <i class="fa-regular fa-comment-dots"></i>
                    <a class="me-1" href="{{route('topics.show',$topic)}}">{{$topic->reply_count}}</a>
                    <i class="fa-regular fa-clock"></i>
                    {{$topic->created_at->diffForHumans()}}
                </small>
            </li>
        @endforeach
    </ul>
    @include('shared._pages',['data'=>$topics])
@else
    @include('shared._no_data',['info'=>'TA还没有发过帖子'])
@endif
