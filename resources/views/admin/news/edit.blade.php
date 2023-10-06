@extends('admin.index')
@section('content')
    <form action="{{route('admin.news.update', $oneNews)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{--    <input type="hidden" id="title" name="category_id" value ="{{$categoryId}}">--}}
        <h1 style="margin-top: 30px" class="h3 mb-3 font-weight-normal">Please add news</h1>
        {{--        <input type="hidden" id="$categoryId" name="category_id" value ="{{$categoryId}}">--}}
        <input type="hidden" id="$created_at" name="$created_at" value ="{{now()->format('y-m-d, h:i')}}">

        <label for="title" class="sr-only">Title</label>
        <input style="margin-top: 30px" type="text" id="title" name="title" value="{{old('title')?? $oneNews->title }}"
               class="form-control @error('title') is-invalid @enderror"
               placeholder="News title" required autofocus>
        @error('title')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror


        <label for="author" class="sr-only">Author</label>
        <input style="margin-top: 30px" type="text" id="author" name="author" value="{{old('author')?? $oneNews->author }}"
               class="form-control @error('author') is-invalid @enderror" placeholder="author">
        @error('author')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror

        <label for="image" class="sr-only"></label>
        <image  alt="twbs" width="50" height="15" class="img-fluid" src="{{asset($oneNews->image)}}"> </image>
        <input style="margin-top: 30px" type="file" id="image" name="image" value="{{asset($oneNews->image)}}"
               class="form-control @error('image') is-invalid @enderror" placeholder="image">
             <input type="hidden" id="imageUrl" name="imageUrl" value ="{{asset($oneNews->image)}}">
        @error('image')
           <div class="invalid-feedback">{{$message}}</div>
        @enderror


        <label for="status" class="sr-only"></label>
        <select style="margin-top: 30px" type="text" id="status" name="status" class="form-control"
                placeholder="status">
                <option @selected(old('status', $oneNews->status) == \App\Http\Enums\news\Status::ACTIVE->value )>
                    {{\App\Http\Enums\news\Status::ACTIVE->value}}</option>
                <option @selected(old('status', $oneNews->status) == \App\Http\Enums\news\Status::DDRAFT->value )>
                    {{\App\Http\Enums\news\Status::DDRAFT->value}}</option>
                <option @selected(old('status', $oneNews->status) == \App\Http\Enums\news\Status::BLOCKED->value )>
                    {{\App\Http\Enums\news\Status::BLOCKED->value}}</option>
        </select>
        <select style="margin-top: 30px" type="text" id="category_id" name="category_id" class="form-control"
                placeholder="category">
            @foreach($categories as $category)
                <option
                    value ="{{$category->id}}" @selected(old('category_id', $oneNews->category_id) == $category->id)>
                        {{$category->title}}
                </option>
            @endforeach
        </select>
        <label for="description" class="sr-only"></label>
        <textarea onfocus="{{$oneNews->description}}" style="margin-top: 30px" type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                  placeholder="Add news here">{{old('description')?? $oneNews->description ?? ''}}
        </textarea>
        @error('description')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
        <button style=" width: 140px; margin: auto; margin-top: 20px" class="btn btn-lg btn-primary btn-block"
                type="submit">Update
        </button>
    </form>

@endsection


