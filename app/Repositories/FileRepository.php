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

    public function file(int $id)
    {
       $file = $this->file->where('id', $id)->first();

       return view('avatar.edit', compact('file'));
    }

    /**
     * Store a newly created resource in storage
     * @param Request $request
     * @return mixed
     */
    public function store(array $input)
    {
        return $this->file->create($input);
    }

    /**
     * @param array $input
     * @param int $id
     * @return mixed
     */
    public function update(array $input, int $id)
    {
        $file = $this->file->where('id', $id)->first();
        $file->update($input);

        return $file;
    }
}
