@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="col-md-12">
                    <h3>Все посты</h3>
                    <ul class="posts">
                        <li><a href="{{route('my-posts')}}">Мои посты</a></li>
                        <li><a href="{{route('popular-posts')}}">Популярные посты</a></li>
                        <li><a href="{{route('posts-no-comments')}}">Посты без ответа</a></li>
                    </ul>
                        <table class="table table-striped table-hover mt-2">
                            <thead>
                            <th>Заголовок</th>
                            <th>Текст статьи</th>
                            <th>Категорию</th>
                            <th>Имя автора</th>
                            <th>Кол-во просмотров</th>
                            <th>Кол-во комментариев</th>
                            <th>Теги</th>
                            <th>Дата публикации</th>
                            <th>Подробнее</th>
                            <th>ссылка на профиль</th>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                            @if($post->user_id !== Auth::user()->id)
                                        <td>{{$post->title}}</td>
                                    @else
                                        <td>{{$post->title}}</td>
                            @endif
                                    <td>{{$post->short_content}}</td>
                                    <td>{{$post->category->title}}</td>
                                <td>{{$post->user->name}}</td>
                                <td>{{$post->views}}</td>
                                <td>{{$post->comments->count()}}</td>
                                <td>{{$post->tags->pluck('title')->join(', ')}}</td>
                                <td>{{$post->created_at}}</td>
                                <td><a href="{{route('posts.show', ['post' => $post->id])}}">Подробнее</a></td>
                                <td><a href="{{route('user-profile', ['id' => $post->user->id])}}">Ссылка на профиль</a>
                                @if($post->user_id == Auth::user()->id)
                                /<a href="{{route('posts.edit', ['post' => $post->id ])}}">Edit Post</a>
                                    @endif
                                </td>
                            @endforeach

                            </tbody>
                        </table>
                    <div class="allnews_pagination">
                        {{$posts->links()}}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
