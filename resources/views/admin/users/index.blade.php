@extends('admin.index')

@section('content')
    <div style="height: 100vh !important" class="table-responsive small">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Users</h1>
        </div>
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">password</th>
                <th scope="col">created_at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $oneUser)
                <tr id="news-{{$oneUser->name}}">
                    <td>
                        @if(@isset($oneUser->image))
                            <image  alt="twbs" width="50" height="15" class="img-fluid" value="{{old($oneNews->image)}}" src="{{asset($oneNews->image)}}"> </image>
                        @else
                            <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32"
                                 class="rounded-circle flex-shrink-0">
                        @endif
                    </td>
                    <td>{{$oneUser->email}}</td>
                    <td>{{$oneUser->password}}</td>
                    <td>{{$oneUser->created_at}}</td>
                    <td>
                        <div class="btn-group me-2">
                            <a type="button" class="btn btn-sm btn-outline-secondary changeIsAdmin" href="javascript:">change</a>--}}
{{--                            <a type="button" class="btn btn-sm btn-outline-secondary" href="{{route('admin.news.edit', $oneNews)}}">edit</a>--}}
{{--                            <a type="button" class="btn btn-sm btn-outline-secondary delete" href="javascript:" rel="{{$oneNews->id}}">delete</a>--}}
{{--                            <a type="button" class="btn btn-sm btn-outline-secondary" href="{{route('admin.news.show', $oneNews)}}">show</a>--}}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
{{--        {{$news->links()}}--}}
    </div>

@endsection
@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let isAdmin = document.querySelectorAll(".changeIsAdmin");
            isAdmin.forEach(function (element) {
                element.addEventListener(('click'), function () {

                });
            });
        });

        // let elements = document.querySelectorAll(".delete");
        // elements.forEach(function (element) {
        //     element.addEventListener(('click'), function () {
        //         const id = this.getAttribute('rel');
        //         if (confirm(`Подтверждаете удаление записи с ID = ${id}`)) {
        //             send(`news/${id}`).then(() => {
        //                 const news = document.getElementById(`news-${id}`);
        //                 if (!news) {
        //                     return;
        //                 }
        //
        //                 news.remove();
        //             });
        //         }
        //     });
        // });

        // async function send(url) {
        //     let response = await fetch(url, {
        //         method: 'DELETE',
        //         headers: {
        //             'x-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        //         }
        //     });
        //     let result = await response.json();
        //     return result.ok;
        // }
    </script>
@endpush

