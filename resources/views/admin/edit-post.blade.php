<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Edit Post {{$post->title}}</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Post {{$post->title}}</h5>
                    <form action="{{route('posts.update', ['post' => $post->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" value="{{$post->title}}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="short_content" value="{{$post->short_content}}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="content" value="{{$post->content}}">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select class="form-control" id="category_id" name="category_id">
                                @foreach($categories as $value)
                                    <option>{{$value->id}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Теги</label>
                            <select multiple class="form-control" name="tags[]">
                                @foreach($tags as $value)
                                    <option value="{{$value->id}}">{{$value->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">
                        </div>

                        <button class="btn btn-success" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>



</div>

