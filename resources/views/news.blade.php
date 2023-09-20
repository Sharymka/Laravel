
@extends('main')

@section('title')
    @parent news
@endsection

@section('content')
    @forelse($news as $oneNews)
        <h2>{{$oneNews["name"]}}</h2>
        <h2>{{$oneNews["description"]}}</h2>
        <h2>{{$oneNews["author"]}}</h2>
        <h2>{{$oneNews["created_at"]}}</h2>
        @if(!$oneNews["isPrivate"])
            <h1>
                <a href = "{{route('showOne', [$oneNews['id']])}}" >Подробнее...</a>
                {{--            <a href = "/news/{{$oneNews['id']}}/show" >Подробнее...</a>--}}
            </h1>
        @endif
        <hr>
    @empty
        <h1>Нет новостей </h1>
    @endforelse
@endsection


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
