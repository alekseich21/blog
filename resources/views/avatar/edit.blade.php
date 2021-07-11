@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Avatar</div>
                    <div class="card-body">
                        <form method="post" action="{{route('update-file', ['id'=> Auth::user()->file->id])}}" enctype="multipart/form-data">
                            @csrf
                            <label for="image"><b>Загрузить аватар</b></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="file" id="image" class="custom-file-input">
                                    <label class="custom-file-label" for="thumbnail">Choose file</label>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Обновить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
