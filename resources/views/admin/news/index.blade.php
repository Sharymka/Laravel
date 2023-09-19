@extends('admin.index')

@section('content')
    <div style="height: 100vh !important" class="table-responsive small">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">News</h1>

            <div class="btn-toolbar mb-2 mb-md-0">
                {{--                <div class="btn-group me-2">--}}
                {{--                    <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>--}}
                {{--                    <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>--}}
                {{--                </div>--}}
                <a href="{{route('admin.news.create')}}" type="button"
                   class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-1">
                    {{--                    <svg class="bi"><use xlink:href="#calendar3"/></svg>--}}
                    Add news
                </a>
            </div>
        </div>
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">image</th>
                <th scope="col">title</th>
                <th scope="col">author</th>
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
                    <td>{{$oneNews->created_at}}</td>
                    <td>{{$oneNews->status}}</td>
                    <td>
                        <div class="btn-group me-2">
                            <a type="button" class="btn btn-sm btn-outline-secondary">edit</a>
                            <a type="button" class="btn btn-sm btn-outline-secondary">delet</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
