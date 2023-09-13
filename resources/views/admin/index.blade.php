@extends('main.main')

@section('title')
    @parent Admin
@endsection

@section('content')

    <h1> точка входа админа</h1>
    Тут какой-то текст</br>
    <p style="color: red ">
        {{--    <a href =<?= route('admin.test1')?>>test1</a><br>--}}
        {{--    <a href = <?= route('admin.test2')?>>test2</a><br>--}}
    </p>

    <a  href ="{{route('admin.news.create')}}" style = " width: 140px; margin: auto; margin-top: 20px" class="btn btn-lg btn-primary btn-block" type="button">Добавить новость</a>
{{--    <div>--}}
{{--        @include('admin.addNews')--}}
{{--    </div>--}}
    <a href= <?= route('home') ?>> Переход на главную страницу</a>
@endsection


