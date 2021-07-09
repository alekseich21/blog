<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Post {{$post->title}}</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/main.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<a href="{{route('home')}}">На главную</a>
<div class="wrapper">

    <div class="header">
        <div class="name">{{$post->title}}</div>
    </div>
    <div class="content">
        {{$post->short_content}}
    <hr>
        {{$post->content}}
    </div>
    <div class="clear"></div>
    <div class="footer">{{$post->user->name}}</div>
</div>

<div>
    @if (session()->has('success'))
        <div class="btn btn-success">
            <h3>{{session('success')}}</h3>
        </div>
    @endif
</div>

<div class="col-md-8 col-md-offset-2">
    Теги -
    @foreach($post->tags as $tag)
        <div class="entry-category-icon"><a href="{{route('tags.show', ['tag' => $tag->id])}}">{{$tag->title}}</a></div>
    @endforeach
</div>
<hr>
<div class="col-md-8 col-md-offset-2">
    <form action="{{route('comments-add')}}" method="post">
        @csrf
        <input type="hidden" value="{{$post->id}}" name="post_id">
        <input type="hidden" value="{{\Auth::user()->id}}" name="user_id">
        <p>Добавить Комментарий</p>
        <textarea class="form-control" name="comment"></textarea>
        <br>
        <button type="submit" class="btn btn-success">Добавить комментарий</button>
    </form>
    @foreach($post->comments as $comment)
        <div class="comments" style="border: 1px solid gray">
            <p>{{$post->user->name}}</p>
            <p>{{$comment->comment}}</p>
            <p>{{$post->created_at}}</p>
            @include('partials._comment_replies', ['comments' => $comment->replies])
        </div>
    @endforeach
</div>
</body>
</html>
