<?php

namespace App\Http\Controllers;

use App\models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class FileController extends Controller
{
    public function save(Request $request)
    {

        $data = $request->all();

        $data['file'] = File::uploadImage($request);
        File::create($data);

        return redirect()->route('home');
    }

    public function edit($id)
    {
        $file = File::where('id', $id);

        return view('avatar-edit', compact('file'));
    }

    public function update(Request $request, $id)
    {
       // dd($id);
        $data = $request->all();//dd($data);

        $file = File::where('id', $id)->first();
        $data['file'] = File::uploadImage($request, $file->file);

        $file->update($data);

        return redirect()->route('home');
    }
}
