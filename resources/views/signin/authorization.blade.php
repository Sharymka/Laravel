@extends('layouts.main')

@section('title')
    @parent authorization
@endsection

@section('content')
    <div class="text-center">
        <form style="width: 40%; margin: auto; margin-top: 30px" class="form-signin">
            <img class="mb-4" src="bootstrap-4.0.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            {{--    <a href= "" class="btn btn-lg btn-primary btn-block">Sign up</a>--}}
            <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
        </form>
    </div>

@endsection

{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
{{--    <meta name="description" content="">--}}
{{--    <meta name="author" content="">--}}
{{--    <link rel="icon" href="bootstrap-4.0.0/favicon.ico">--}}

{{--    <title>Signin Template for Bootstrap</title>--}}

{{--    <!-- Bootstrap core CSS -->--}}
{{--    <link href="bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">--}}

{{--    <!-- Custom styles for this template -->--}}
{{--    <link href="bootstrap-4.0.0/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">--}}
{{--</head>--}}
