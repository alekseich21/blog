@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-20">
                <h3>Мои посты</h3>
                <ul class="posts">
                </ul>
                <table class="table table-striped table-hover mt-2">
                    <thead>
                    <th>Title</th>
                    <th>Short Content</th>
                    <th>Comments</th>
                    <th>Views</th>
                    <th>Date</th>
                    <th>Tags</th>
                    <th>Details</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->short_content }}</td>
                            <td>0</td>
                            <td>{{ $post->views }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->tags->pluck('title')->join(', ') }}</td>
                            <td><a href="{{route('post-show', ['id'=>$post->id])}}">Details</a></td>
                            <td>
                                @if($post->user_id == Auth::user()->id)
                                    <a href="{{route('post-edit', ['id' => $post->id])}}" class="btn btn-primary">Edit</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
