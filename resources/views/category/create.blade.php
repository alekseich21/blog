@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Category</div>
                    <div class="card-body">
                        <form method="post" action="{{route('save-category')}}">
                            <div class="form-group">
                                @csrf
                                <label class="label">Category Title: </label>
                                <input type="text" name="title" class="form-control" required/>
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
