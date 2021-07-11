<?php

namespace App\Repositories;

use App\Models\File;
use App\Repositories\Interfaces\FileRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class FileRepository
 * @package App\Repositories
 */
class FileRepository implements FileRepositoryInterface
{
    /**
     * @var File
     */
    private $file;

    /**
     * FileRepository constructor.
     * @param File $file
     */
    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function file($id)
    {
       $file = $this->file->where('id', $id)->first();

       return view('avatar.edit', compact('file'));
    }

    /**
     * Store a newly created resource in storage
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['file'] = $this->file->uploadImage($request);

        return $this->file->create($data);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $file = $this->file->where('id', $id)->first();
        $data['file'] = $this->file->uploadImage($request);
        $file->update($data);

        return $file;
    }
}
