<?php

namespace App\Services;

use App\Repositories\Interfaces\FileRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class UploadImageService
 * @package App\Services
 */
class UploadImageService
{
    /**
     * @var FileRepositoryInterface
     */
    private $fileRepository;

    /**
     * UploadImageService constructor.
     * @param FileRepositoryInterface $fileRepository
     */
    public function __construct(FileRepositoryInterface $fileRepository)
    {
        $this->fileRepository = $fileRepository;
    }

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
    }

    /**
     * @param Request $request
     * @param null $id
     * @return mixed
     */
    public function saveImage(Request $request, $id = null)
    {
        $data = $request->all();
        $data['file'] = $this->uploadImage($request);
        if($id){

            return $this->fileRepository->update($data, $id);
        }

        return $this->fileRepository->store($data);
    }
}
