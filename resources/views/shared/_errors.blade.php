@if(count($errors)>0)
    <div class="alert alert-danger " role="alert">
        <ul class="mt-2" style="list-style-type: none">
            @foreach($errors->all() as $error)
                <li>
                    <i class="fa-solid fa-triangle-exclamation me-1"></i>{{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif
