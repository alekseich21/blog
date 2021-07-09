<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    protected $fillable = ['user_id', 'file'];

    public static function uploadImage(Request $request, $image = null)
    {
        if($request->hasFile('file')){
            if($image){
                Storage::delete($image);
            }
            $name = $request->file('file')->getClientOriginalName();
            $folder = date('Y-m-d');
            return $request->file('file')->storeAs("images/{$folder}", "$name");
        }

        return null;
    }

    public function getImage()
    {
        if(!$this->file){
            return asset('assets/img/no-image.png');
        }
        return asset("uploads/$this->file");
    }

}


