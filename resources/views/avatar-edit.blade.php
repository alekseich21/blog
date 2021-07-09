

<form action="{{route('update-file', ['id' => Auth::user()->file->id] )}}" method="post" enctype="multipart/form-data">
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
