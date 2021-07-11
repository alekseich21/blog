@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Post</div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> - {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="post" action="{{route('save-post')}}">
                            @csrf
                            <div class="form-group">
                                <label class="label">Post Title: </label>
                                <input type="text" name="title" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label class="label">Post Short Content: </label>
                                <input type="text" name="short_content" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label class="label">Post Content: </label>
                                <textarea name="content" rows="10" cols="30" class="form-control" required></textarea>
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
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
