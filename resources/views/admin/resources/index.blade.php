@extends('admin.index')

@section('content')
    <div style="height: 100vh !important" class="table-responsive small">
        @include('inc.message')
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Resources</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{route('admin.resources.create')}}" type="button"
                   class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-1">
                    Add resource
                </a>
            </div>
        </div>
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">image</th>
                <th scope="col">url</th>
                <th scope="col">created_at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($urls as $url)
                <tr id="user-{{$url->id}}">
                    <td>
                        <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32"
                             class="rounded-circle flex-shrink-0">
                    </td>
                    <td>{{$url->url}}</td>
                    <td>{{$url->created_at}}</td>


                    <td>

                        <div class="btn-group me-2">
                            <a type="button" class="btn btn-sm btn-outline-secondary"
                               href="{{route('admin.resources.edit', $url)}}">edit</a>
                            <a type="button" class="btn btn-sm btn-outline-secondary deleteUrl" href="javascript:"
                               rel="{{$url->id}}">delete</a>
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

        let elements = document.querySelectorAll(".deleteUrl");
        elements.forEach(function (element) {
            element.addEventListener(('click'), function () {
                const id = this.getAttribute('rel');
                if (confirm(`Подтверждаете удаление записи с ID = ${id}`)) {
                    send(`resources/${id}`).then(() => {
                        const user = document.getElementById(`user-${id}`);
                        if (!user) {
                            return;
                        }

                        user.remove();
                    });
                }
            });
        });

        async function send(url) {
            console.log(url)
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'x-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush

