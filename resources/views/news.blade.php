
@extends('main')

@section('title')
    @parent news
@endsection

@section('content')

    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="calendar-event" viewBox="0 0 16 16">
            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
        </symbol>

        <symbol id="alarm" viewBox="0 0 16 16">
            <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
            <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
        </symbol>

        <symbol id="list-check" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
        </symbol>
    </svg>

    <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
        <div class="list-group">
            @forelse($blockOfNews as $oneNews)
                <div href="" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">{{$oneNews["name"]}}</h6>
                            <p class="mb-0 opacity-75">{{$oneNews["description"]}}</p>
                            <p class="mb-0 opacity-75">{{$oneNews["author"]}}</p>
                            @if(!$oneNews["isPrivate"])
                                <p>
                                    <a href = "{{route('showOne', [$categoryName, $oneNews['id']])}}" class="opacity-50 text-nowrap" >Подробнее...</a>
                                </p>
                            @endif
                        </div>
                        <small class="opacity-50 text-nowrap">{{$oneNews["created_at"]}}</small>
                        <hr>
                    </div>
                </div>
            @empty
                <h1>Нет новостей </h1>
            @endforelse
            <div>
                <div class="container">
                    @yield('content')
                </div>
            </div>
                <h1 style = "margin-top: 20px" class="h3 mb-3 font-weight-normal">Please add news</h1>
                <label for="addNews" class="sr-only"></label>
                <input type="text" id="addNews" class="form-control" placeholder="Add news here" required autofocus>
                <button style = " width: 140px; margin: auto; margin-top: 20px" class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
            </div>
    </div>
@endsection


{{--@extends('main')--}}

{{--@section('title')--}}
{{--    @parent news--}}
{{--@endsection--}}

{{--@section('content')--}}
{{--    @forelse($news as $oneNews)--}}
{{--        <h2>{{$oneNews["name"]}}</h2>--}}
{{--        <h2>{{$oneNews["description"]}}</h2>--}}
{{--        <h2>{{$oneNews["author"]}}</h2>--}}
{{--        <h2>{{$oneNews["created_at"]}}</h2>--}}
{{--        @if(!$oneNews["isPrivate"])--}}
{{--            <h1>--}}
{{--                <a href = "{{route('showOne', [$oneNews['id']])}}" >Подробнее...</a>--}}
{{--                --}}{{--            <a href = "/news/{{$oneNews['id']}}/show" >Подробнее...</a>--}}
{{--            </h1>--}}
{{--        @endif--}}
{{--        <hr>--}}
{{--    @empty--}}
{{--        <h1>Нет новостей </h1>--}}
{{--    @endforelse--}}
{{--@endsection--}}


{{--@forelse($news as $oneNews)--}}
{{--    <h2>{{$oneNews["name"]}}</h2>--}}
{{--    <h2>{{$oneNews["description"]}}</h2>--}}
{{--    <h2>{{$oneNews["author"]}}</h2>--}}
{{--    <h2>{{$oneNews["created_at"]}}</h2>--}}
{{--    @if(!$oneNews["isPrivate"])--}}
{{--        <h1>--}}
{{--            <a href = "{{route('showOne', [$oneNews['id']])}}" >Подробнее...</a>--}}
{{--            <a href = "/news/{{$oneNews['id']}}/show" >Подробнее...</a>--}}
{{--        </h1>--}}
{{--    @endif--}}
{{--    <hr>--}}
{{--@empty--}}
{{--    <h1>Нет новостей </h1>--}}
{{--@endforelse--}}

{{--<h1>Новости </h1>--}}
{{--<?php foreach ( $news as $n): ?>--}}
{{--<h2>--}}
{{--    <div><?=$n["name"]?></div>--}}
{{--</h2>--}}
{{--<div><?=$n["description"]?></div>--}}
{{--<div><?=$n["author"]?></div>--}}
{{--<div><?=$n["created_at"]?></div>--}}
{{--<a href = <?= route('showOne', [$n['id']])?>>Далее</a>--}}
{{--<hr>--}}
{{--<?php endforeach; ?>--}}
