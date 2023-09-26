@extends('admin.index')
@section('content')
    <form action="{{route('admin.categories.store')}}" method="post">
        @csrf
        {{--    <input type="hidden" id="title" name="category_id" value ="{{$categoryId}}">--}}
        <h1 style="margin-top: 30px" class="h3 mb-3 font-weight-normal">Please add category</h1>
        <label for="title" class="sr-only"></label>
        <input style="margin-top: 30px" type="text" id="title" name="title" value="{{old('title')}}"
               class="form-control @error('title') is-invalid @enderror"
               placeholder="Category title" required autofocus>
        @error('title')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror

        <label for="author" class="sr-only"></label>
        <input style="margin-top: 30px" type="text" id="author" name="author" value="{{old('author')}}"class="form-control @error('author') is-invalid @enderror"
               placeholder="Category author" required autofocus>
        @error('author')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror

        <label for="description" class="sr-only"></label>
        <input style="margin-top: 30px" type="text" id="description" name="description" value="{{old('description')}}"class="form-control @error('description') is-invalid @enderror"
               placeholder="Category description" required autofocus>
        @error('description')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror


        <input style="margin-top: 30px" type="hidden" id="created_at" name="created_at" value="{{now()->format('y-m-d, h:i')}}"  class="form-control" placeholder="author">

        <button style=" width: 140px; margin: auto; margin-top: 20px" class="btn btn-lg btn-primary btn-block"
                type="submit">Add
        </button>
    </form>

@endsection


