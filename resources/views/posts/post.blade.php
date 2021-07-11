
@extends('layouts.app')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p><b>{{ $post->title }}</b></p>
                        <p>{{ $post->short_content }}</p>
                        <p>{{$post->created_at}}</p>
                        <p>Tags
                        @foreach($post->tags as $tag)
                            <div class="entry-category-icon"><a href="{{route('tag-show', ['id' => $tag->id])}}">{{$tag->title}}</a></div>
                        @endforeach
                        </p>
                        <hr />
                        <h4>Add comment</h4>
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li> - {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <form method="post" action="{{route('comment-add')}}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="comment" class="form-control" />
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-warning" value="Add Comment" />
                            </div>
                        </form>
                        <h4>Display Comments</h4>

                        @include('comments.replies.replies', ['comments' => $post->comments, 'post_id' => $post->id])


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
