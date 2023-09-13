@extends('main.main')
@section('content')
<form action="{{route('admin.news.store')}}" method="post">
    @csrf
{{--    <input type="hidden" id="title" name="category_id" value ="{{$categoryId}}">--}}
    <h1 style = "margin-top: 30px" class="h3 mb-3 font-weight-normal">Please add news</h1>
    <label for="title" class="sr-only"></label>
    <input style = "margin-top: 30px" type="text" id="title" name="title" class="form-control" placeholder="News title" required autofocus>

    <label for="author" class="sr-only"></label>
    <input style = "margin-top: 30px" type="text" id="author" name="author" class="form-control" placeholder="author">

    <label for="category" class="sr-only"></label>
    <select style = "margin-top: 30px" type="text" id="category" name="category" class="form-control" placeholder="category">


    </select>


    <label for="description" class="sr-only"></label>
    <textarea  style = "margin-top: 30px" type="text" id="description" name="description" class="form-control" placeholder="Add news here"></textarea>
    <button style = " width: 140px; margin: auto; margin-top: 20px" class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
</form>

@endsection

{{--    <form action="{{route('admin.news.create')}}" method="post">--}}
{{--        @csrf--}}
{{--        <p>--}}
{{--            <b><label for="name">News name:</label></b>--}}
{{--            <input name="name" id="name" type="text">--}}
{{--        </p>--}}
{{--        <p>--}}
{{--            <b><label for="briefDesc">Brief description:</label></b>--}}
{{--            <input name="briefDesc" id="briefDesc" type="text">--}}
{{--        </p>--}}
{{--        <p>--}}
{{--        <p><b>Full description:</b></p>--}}
{{--        <textarea rows="10" cols="45" name="fullDesc"></textarea>--}}
{{--        </p>--}}
{{--        <button style="margin: 0; padding: 10px 30px 10px 30px;" type="submit">add news</button>--}}
{{--    </form>--}}

