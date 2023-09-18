@extends('admin.index')
@section('content')
    <form action="{{route('admin.news.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{--    <input type="hidden" id="title" name="category_id" value ="{{$categoryId}}">--}}
        <h1 style="margin-top: 30px" class="h3 mb-3 font-weight-normal">Please add news</h1>
        {{--        <input type="hidden" id="$categoryId" name="category_id" value ="{{$categoryId}}">--}}
                <input type="hidden" id="$created_at" name="$created_at" value ="{{now()->format('y-m-d, h:i')}}">
        <label for="title" class="sr-only"></label>
        <input style="margin-top: 30px" type="text" id="title" name="title" value="{{old('title')}}"
               class="form-control"
               placeholder="News title" required autofocus>

        <label for="author" class="sr-only"></label>
        <input style="margin-top: 30px" type="text" id="author" name="author" value="{{old('author')}}"
               class="form-control" placeholder="author">

        <label for="image" class="sr-only"></label>
        <input style="margin-top: 30px" type="file" id="image" name="image" value="#"
               class="form-control" placeholder="author">

        <input type="hidden" id="created_at" name="created_at" value="{{now()->format('y-m-d')}}">

        <label for="status" class="sr-only"></label>
        <select style="margin-top: 30px" type="text" id="status" name="status" class="form-control"
                placeholder="status">
            @foreach($statuses as $status)
                <option @if(old('status') == $status) selected @endif>{{$status}}</option>
            @endforeach
        </select>
        <select style="margin-top: 30px" type="text" id="category" name="category" class="form-control"
                placeholder="category">
            @foreach($categories as $category)
                <option>{{$category->title}}</option>
            @endforeach
        </select>
        <label for="description" class="sr-only"></label>
        <textarea style="margin-top: 30px" type="text" id="description" name="description" class="form-control"
                  placeholder="Add news here"></textarea>
        <button style=" width: 140px; margin: auto; margin-top: 20px" class="btn btn-lg btn-primary btn-block"
                type="submit">Add
        </button>
    </form>

@endsection

