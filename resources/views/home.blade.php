
@extends('main')

@section('title')
    @parent Home
@endsection

@section('content')
<h1>Приветствие пользователя</h1>
Тут какой-то текст</br>
<a href = <?=route('admin.index')?>> Переход на админ страницу</a><br>
<a href = <?=route('news')?>>Новости </a>
@endsection
