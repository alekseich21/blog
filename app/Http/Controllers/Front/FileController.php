<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\UploadImageService;
use Illuminate\Http\Request;
use App\Models\File;
use App\Repositories\Interfaces\FileRepositoryInterface;

/**
 * Class FileController
 * @package App\Http\Controllers\Front
 */
class FileController extends Controller
{
    /**
     * @var FileRepositoryInterface
     */
    private $repository;

    private $uploadImageService;

    /**
     * FileController constructor.
     * @param FileRepositoryInterface $repository
     */
    public function __construct(FileRepositoryInterface $repository, UploadImageService $uploadImageService)
    {
        $this->repository = $repository;
        $this->uploadImageService = $uploadImageService;
    }

    /**
     * @param $id
     * Show Form
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $image = $this->repository->file($id);

        return view('avatar.edit', compact('image'));
    }

    /**
     * @param Request $request
     * Store a newly created resource in storage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $this->uploadImageService->saveImage($request);

        return redirect()->route('home');
    }

    /**
     * @param Request $request
     * Update Image
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->uploadImageService->saveImage($request, $id);

        return redirect()->route('home');
    }
}
