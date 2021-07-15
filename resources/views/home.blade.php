@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cabinet</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   Hello  {{ Auth::user()->name }}
                        @if(Auth::user()->file)
                            <div>
                                <img width="200" src="{{Auth::user()->file->getImage()}} " alt="">
                            </div>
                            <a href="{{route('file-edit', ['id'=> Auth::user()->file->id])}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Редактировать аватар</a>
                        @else
                            <form action="{{route('save-file')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <div class="form-group">
                                    <label for="image"><b>Загрузить аватар</b></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="file" class="custom-file-input">
                                            <label class="custom-file-label" for="thumbnail">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </form>
                        @endif
                        <div>
                            <br><br><a href="{{route('post-create')}}">Add New Post</a>
                            <br><br><a href="{{route('category-create')}}">Add New Category</a>
                            <br><br><a href="{{route('tag-create')}}">Add New Tag</a>
                        </div>
                        <div>
                            <table class="table table-striped table-hover mt-2">
                                <thead>
                                <th>Заголовок</th>
                                <th>Текст статьи</th>
                                </thead>
                                <tbody>
                                @foreach($user->posts as $post)
                                    <tr>

                                        <td><a href="{{route('post-show', ['id' => $post->id])}}">{{$post->title}}</a></td>
                                        <td>{{$post->short_content}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
