@extends('admin.index')
@section('content')
    <form action="{{route('admin.users.update', $user)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{--    <input type="hidden" id="title" name="category_id" value ="{{$categoryId}}">--}}
        <h1 style="margin-top: 30px" class="h3 mb-3 font-weight-normal">Change data</h1>
        {{--        <input type="hidden" id="$categoryId" name="category_id" value ="{{$categoryId}}">--}}
        <input type="hidden" id="$created_at" name="$created_at" value ="{{now()->format('y-m-d, h:i')}}">

        <label for="name" class="sr-only">Name</label>
        <input style="margin-top: 30px" type="text" id="name" name="name" value="{{old('name')?? $user->name }}"
               class="form-control  @error('name') is-invalid @enderror"
               placeholder="name" required autofocus>
        @error('name')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror

        <label for="email" class="sr-only">Email</label>
        <input style="margin-top: 30px" type="text" id="email" name="email" value="{{old('email')?? $user->email }}"
               class="form-control @error('email') is-invalid @enderror" placeholder="email">
        @error('email')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror

        <label for="is_admin" class="sr-only"></label>
        <input style="margin-top: 30px" type="text" id="is_admin" name="is_admin" value="{{old('is_admin')?? $user->is_admin}}"
               class="form-control @error('is_admin') is-invalid @enderror" placeholder="is_admin">
        @error('is_admin')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror

        <label for="updated_at" class="sr-only"></label>
        <input  type="hidden" style="margin-top: 30px" type="file" id="updated_at" name="updated_at" value="{{now()->format('y-m-d')}}"
               class="form-control" placeholder="updated_at">

        <button style=" width: 140px; margin: auto; margin-top: 20px" class="btn btn-lg btn-primary btn-block"
                type="submit">Update
        </button>
    </form>

@endsection


