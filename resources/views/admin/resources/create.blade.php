@extends('admin.index')
@section('content')
    <form action="{{route('admin.resources.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('inc.message')
        <h1 style="margin-top: 30px" class="h3 mb-3 font-weight-normal">Please add news</h1>
        {{--        <input type="hidden" id="$categoryId" name="category_id" value ="{{$categoryId}}">--}}
        <input type="hidden" id="$created_at" name="$created_at" value="{{now()->format('y-m-d, h:i')}}">

        <label for="title" class="sr-only"></label>
        <input style="margin-top: 30px" type="text" id="url" name="url" value="{{old('url')}}"
               class="form-control @error('url') is-invalid @enderror"
               placeholder="News title" required autofocus>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button style=" width: 140px; margin: auto; margin-top: 20px" class="btn btn-lg btn-primary btn-block"
                type="submit">Add
        </button>
    </form>
@endsection

