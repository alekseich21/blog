@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        Hello, {{Auth::user()->name}}

                    @if(Auth::user()->file)

                        <div>
                            <img width="200" src="{{Auth::user()->file->getImage()}} " alt="">
                        </div>
                            <a href="{{route('edit-file', ['id' => Auth::user()->file->id])}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Редактировать аватар</a>

                        @else
                            <form action="{{route('save-file')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <div class="form-group">
                                    <label for="image"><b>Загрузить аватар</b></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="file" id="image" class="custom-file-input">
                                            <label class="custom-file-label" for="thumbnail">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </form>

                        @endif

{{--                        <form action="{{route('save-file')}}" method="post" enctype="multipart/form-data">--}}
{{--                                                                            @csrf--}}
{{--                                                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">--}}
{{--                                                                            <div class="form-group">--}}
{{--                                                                                <label for="image"><b>Загрузить аватар</b></label>--}}
{{--                                                                                <div class="input-group">--}}
{{--                                                                                    <div class="custom-file">--}}
{{--                                                                                        <input type="file" name="file" id="image" class="custom-file-input">--}}
{{--                                                                                        <label class="custom-file-label" for="thumbnail">Choose file</label>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div>--}}
{{--                                                                                <button type="submit" class="btn btn-primary">Сохранить</button>--}}
{{--                                                                            </div>--}}
{{--                                                                        </form>--}}



{{--                        @if(Auth::user()->file->file)--}}

{{--                            <form action="" method="post" enctype="multipart/form-data">--}}
{{--                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">--}}
{{--                                <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Редактировать аватар</a>--}}
{{--                            </form>--}}

{{--                        @else--}}

{{--                            <form action="{{route('save-file')}}" method="post" enctype="multipart/form-data">--}}
{{--                                                                                @csrf--}}
{{--                                                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">--}}
{{--                                                                                <div class="form-group">--}}
{{--                                                                                    <label for="image"><b>Загрузить аватар</b></label>--}}
{{--                                                                                    <div class="input-group">--}}
{{--                                                                                        <div class="custom-file">--}}
{{--                                                                                            <input type="file" name="file" id="image" class="custom-file-input">--}}
{{--                                                                                            <label class="custom-file-label" for="thumbnail">Choose file</label>--}}
{{--                                                                                        </div>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                                <div>--}}
{{--                                                                                    <button type="submit" class="btn btn-primary">Сохранить</button>--}}
{{--                                                                                </div>--}}
{{--                                                                            </form>--}}
{{--                        @endif--}}






{{--                        @foreach(Auth::user()->files as $avatar)--}}
{{--                            @if($avatar->user_id == Auth::user()->id)--}}
{{--                                {{$avatar->file}}--}}
{{--                                @endif--}}
{{--                                @if(count(Auth::user()->files) > 0)--}}
{{--                                    <form action="#" method="post" enctype="multipart/form-data">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">--}}
{{--                                        <div>--}}
{{--                                            <a href="{{route('edit-file', ['id' => $avatar->id])}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Редактировать аватар</a>--}}
{{--                                        </div>--}}
{{--                                        @else--}}

{{--                                            <form action="{{route('save-file')}}" method="post" enctype="multipart/form-data">--}}
{{--                                                @csrf--}}
{{--                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label for="image"><b>Загрузить аватар</b></label>--}}
{{--                                                    <div class="input-group">--}}
{{--                                                        <div class="custom-file">--}}
{{--                                                            <input type="file" name="file" id="image" class="custom-file-input">--}}
{{--                                                            <label class="custom-file-label" for="thumbnail">Choose file</label>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <button type="submit" class="btn btn-primary">Сохранить</button>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}

{{--                                        @endif--}}
{{--                        @endforeach--}}



                        <br><br><a href="{{route('posts.create')}}">Add New Post</a>
                        <br><br><a href="{{route('categories.create')}}">Add New Category</a>
                        <br><br><a href="{{route('tags.create')}}">Add New Tag</a>
                </div>

                <div>
                    <table class="table table-striped table-hover mt-2">
                        <thead>
                        <th>Заголовок</th>
                        <th>Текст статьи</th>
                        <th>Категорию</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                        <tr>

                            <td><a href="{{route('posts.show', ['post' => $post->id])}}">{{$post->title}}</a></td>
                            <td>{{$post->short_content}}</td>
                            <td>{{$post->category_id}}</td>
                            <td>
                                <a href="{{route('posts.edit', ['post'=> $post->id])}}">Edit</a>/
                                <form action="{{route('posts.destroy', ['post' => $post->id])}}" method="post" class="float-left" onclick="return confirm('Подтвердите удаление')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
