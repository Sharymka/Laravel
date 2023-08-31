
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@section('title')Страница @show</title>
</head>
<body>
    <div class="main-menu">
        <ul>
            <li><a href="{{route('home')}}">Главная страница</a></li>
            <li><a href="{{route('admin.index')}}">Переход на admin страницу</a></li>
            <li><a href="{{route('news')}}">Новости</a></li>
        </ul>
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
