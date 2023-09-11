
@extends('main')

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
        <div>
            @include('admin.addNews');
        </div>
    <a href = <?= route('home') ?>> Переход на главную страницу</a>
@endsection


