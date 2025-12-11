<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm my_navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('root')}}">
            <img src="{{asset('/pics/logo/Laravel.png')}}" alt="logo" width="30px">
            BBS Chat
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('topics.index') ? 'active text-primary fw-bold' : '' }}" aria-current="page" href="{{route('topics.index')}}">帖子</a>
                </li>
                @foreach(\App\Models\Category::all() as $category)
                    <li class="nav-item">
                        <a class="nav-link {{ category_navbar_active($category) }}"
                           href="{{ route('categories.show', $category) }}">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">注册</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">登录</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="img-thumbnail" src="{{Auth::user()->avatar}}" alt="avatar" style="width: 40px">
                            {{Auth::user()->name}}
                        </a>
                        <ul class="dropdown-menu">
                            <li class="text-center">
                                <a class="dropdown-item" href="{{route('users.show',Auth::id())}}">
                                    <i class="fa-solid fa-user-tie"></i>
                                    个人中心
                                </a>
                            </li>
                            <li class="text-center">
                                <a class="dropdown-item" href="{{route('users.edit',Auth::id())}}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    编辑资料
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li class="text-center">
                                <form action="{{route('logout')}}" method="post" onsubmit="return confirm('确定要退出吗？')">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        退出
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
