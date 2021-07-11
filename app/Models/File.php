<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class File extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['user_id', 'file'];

    /**
     * @param Request $request
     * @param null $image
     * @return false|string|null
     */
    public function uploadImage(Request $request, $image = null)
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

    /**
     * return image path
     * @return string
     */
    public function getImage()
    {
        return ($this->file) ? asset("uploads/{$this->file}") : asset("img/no-image.png");
    }
}
