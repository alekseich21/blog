@foreach($comments as $comment)
    <div class="display-comment">
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->comment }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('reply-add') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="comment" class="form-control" />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('comments.replies.replies', ['comments' => $comment->replies])
    </div>
@endforeach
