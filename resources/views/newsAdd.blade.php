@extends('news')

@section('title')
@parent news
@endsection

@section('content')
    <form action="action.php" method="post">

        <p>
            <b><label for="name">News name:</label></b>
            <input name="name" id="name" type="text">
        </p>
        <p>
            <b><label for="briefDesc">Brief description:</label></b>
            <input name="briefDesc" id="briefDesc" type="text">
        </p>
        <p>
        <p><b>Full description:</b></p>
        <textarea rows="10" cols="45" name="fullDesc"></textarea>
        </p>
        <button style="margin: 0; padding: 10px 30px 10px 30px;" type="submit">add</button>
    </form>
@endsection
