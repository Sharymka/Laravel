@extends('admin.index')
@section('content')
    <form action="{{route('admin.categories.update', $category->id)}}" method="post">
        @csrf
        @method('PUT')
        {{--    <input type="hidden" id="title" name="category_id" value ="{{$categoryId}}">--}}
        <h1 class="h3 mb-3 font-weight-normal">Please update category</h1>
        <label for="title" class="sr-only">Title</label>
        <input type="text" id="title" name="title" value="{{old('title')?? $category->title }}"
               class="form-control @error('title') is-invalid @enderror"
               placeholder="Category title" required autofocus><br>
        @error('title')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror

        <label for="author" class="sr-only">Author</label>
        <input type="text" id="author" name="author" value="{{old('author')?? $category->author}}" class="form-control @error('author') is-invalid @enderror"
               placeholder="Category author" required autofocus><br>
        @error('author')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror

        <label for="description" class="sr-only">Description</label>
        <input type="text" id="description" name="description" value="{{old('description')?? $category->description}}" class="form-control @error('description') is-invalid @enderror"
               placeholder="Category description" required autofocus><br>
        @error('description')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror

        <label for="updated_at" class="sr-only"></label>
        <input type="hidden" id="updated_at" name="updated_at" value="{{now()->format('y-m-d, h:i')}}"

               class="form-control" placeholder="author">
        <button style=" width: 140px; margin: auto; margin-top: 20px" class="btn btn-lg btn-primary btn-block"
                type="submit">Update
        </button>
    </form>

@endsection



