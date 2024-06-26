
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <title>@section('title')@show</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="/public/bootstrap-5.3.1/assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.115.4">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/sticky-footer/sticky-footer.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="/public/bootstrap-5.3.1/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bootstrap-5.3.1/headers/headers.css" rel="stylesheet">
    <link href="/public/bootstrap-5.3.1/dashboard/dashboard.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/footers/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="/bootstrap-5.3.1/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href ="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href ="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
    <link rel="icon" href="bootstrap-4.0.0/favicon.ico">
    <link href="/bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
{{--    <link href="/bootstrap-4.0.0/docs/4.0/examples/sign-in/sign-in.css" rel="stylesheet">--}}
    <link href="/bootstrap-5.3.1/sign-in/sign-in.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="d-flex flex-column h-100">
<x-news.layouts.header></x-news.layouts.header>
    <div class="container">
        @yield('content')
    </div>
{{--    <div class="container">--}}
{{--        <x-alert :type="request()->query('t', 'light')" message="some alert and message"></x-alert>--}}
{{--        <x-alert type="danger" message="some alert and message"></x-alert>--}}
{{--        <x-alert type="info" message="some alert and message"></x-alert>--}}
{{--        <x-alert type="success" message="some alert and message"></x-alert>--}}
{{--    </div>--}}
<x-news.layouts.footer></x-news.layouts.footer>
