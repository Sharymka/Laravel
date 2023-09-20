
    <form action="{{route('news.addNews')}}" method="post">
        @csrf
        <input type="hidden" id="title" name="category_id" value ="{{$categorySlug}}">
        <h1 style = "margin-top: 20px" class="h3 mb-3 font-weight-normal">Please add news</h1>
        <label for="title" class="sr-only"></label>
        <input type="text" id="title" name="title" class="form-control" placeholder="News title" required autofocus>
        <label for="addNews" class="sr-only"></label>
        <textarea type="text" id="addNews" name="description" class="form-control" placeholder="Add news here"></textarea>
        <button style = " width: 140px; margin: auto; margin-top: 20px" class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
    </form>
