@extends('admin.index')

@section('content')
    <div style="height: 100vh !important" class="table-responsive small">
                <x-alert type="success" message="some alert and message"></x-alert>
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">News</h1>

            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{route('admin.news.create')}}" type="button"
                   class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-1">
                    Add news
                </a>
            </div>
        </div>
        <select id="filter" >
                <option>selected</option>
                <option>{{\App\Http\Enums\news\Status::ACTIVE->value}}</option>
                <option>{{\App\Http\Enums\news\Status::DDRAFT->value}}</option>
                <option>{{\App\Http\Enums\news\Status::BLOCKED->value}}</option>
        </select>
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">image</th>
                <th scope="col">title</th>
                <th scope="col">author</th>
                <th scope="col">category</th>
                <th scope="col">date added</th>
                <th scope="col">status</th>
                <th scope="col">action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($news as $oneNews)
                <tr>
                    <td>
                        @if(@isset($oneNews->image))
                            <image  alt="twbs" width="50" height="15" class="img-fluid" src="{{asset('/storage/'.$oneNews->image)}}"> </image>
                        @else
                            <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32"
                                 class="rounded-circle flex-shrink-0">
                        @endif
                    </td>
                    <td>{{$oneNews->title}}</td>
                    <td>{{$oneNews->author}}</td>
                    <td>{{$oneNews->category->title}}</td>
                    <td>{{$oneNews->created_at}}</td>
                    <td>{{$oneNews->status}}</td>
                    <td>
                        <div class="btn-group me-2">
                            <a href="{{route('admin.news.edit', $oneNews)}}" type="button" class="btn btn-sm btn-outline-secondary">edit</a>
                            <a type="button" class="btn btn-sm btn-outline-secondary">delet</a>
                            <a  href="{{route('admin.news.show', $oneNews)}}"type="button" class="btn btn-sm btn-outline-secondary">show</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$news->links()}}
    </div>

@endsection
@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let filter = document.getElementById('filter');

            filter.addEventListener("change", function (event) {
                location.href = "?f=" + this.value;
            })
        })
    </script>
@endpush
