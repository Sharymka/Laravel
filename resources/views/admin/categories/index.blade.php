@extends('admin.index')
@section('content')
    <div style="height: 100vh !important" class="table-responsive small">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Categories</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{route('admin.categories.create')}}" type="button"
                   class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-1">
                    Add category
                </a>
            </div>
        </div>
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">title</th>
                <th scope="col">author</th>
                <th scope="col">date added</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->title}}</td>
                    <td>{{$category->description}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>
                        <div class="btn-group me-2">
                            <a  href="{{route('admin.categories.edit', $category)}}" type="button" class="btn btn-sm btn-outline-secondary">edit</a>
                            <a type="button" class="btn btn-sm btn-outline-secondary">delet</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$categories->links()}}
    </div>

@endsection

