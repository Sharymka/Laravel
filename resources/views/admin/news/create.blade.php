@extends('admin.index')
@section('content')
    <form action="{{route('admin.news.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{--    <input type="hidden" id="title" name="category_id" value ="{{$categoryId}}">--}}
        <h1 style="margin-top: 30px" class="h3 mb-3 font-weight-normal">Please add news</h1>
        {{--        <input type="hidden" id="$categoryId" name="category_id" value ="{{$categoryId}}">--}}
        {{--        <input type="hidden" id="$newsId" name="news_id" value ="{{count($news->getNews()) + 1}}">--}}
        <label for="title" class="sr-only"></label>
        <input style="margin-top: 30px" type="text" id="title" name="title" value="{{old('title')}}"
               class="form-control"
               placeholder="News title" required autofocus>

        <label for="author" class="sr-only"></label>
        <input style="margin-top: 30px" type="text" id="author" name="author" value="{{old('author')}}"
               class="form-control" placeholder="author">

        <input type="hidden" id="created_at" name="created_at" value="{{now()->format('y-m-d')}}">

        <label for="status" class="sr-only"></label>
        <select style="margin-top: 30px" type="text" id="status" name="status" class="form-control"
                placeholder="status">
            <option @if(old('status') == 'draft') selected @endif>draft</option>
            <option @if(old('status') == 'active') selected @endif>active</option>
            <option @if(old('status') == 'blocked') selected @endif>blocked</option>
        </select>
        <select style="margin-top: 30px" type="text" id="category" name="category" class="form-control"
                placeholder="category">
            <option>economics</option>
            <option>politics</option>
            <option>weather</option>
            <option>city live</option>
        </select>
        <label for="description" class="sr-only"></label>
        <textarea style="margin-top: 30px" type="text" id="description" name="description" class="form-control"
                  placeholder="Add news here"></textarea>
        <button style=" width: 140px; margin: auto; margin-top: 20px" class="btn btn-lg btn-primary btn-block"
                type="submit">Add
        </button>
    </form>

@endsection

