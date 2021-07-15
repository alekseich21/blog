<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Front
 */
class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $repository;

    /**
     * CategoryController constructor.
     * @param CategoryRepositoryInterface $repository
     */
    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Show the form for creating a new resource
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * @param Request $request
     * Store a newly created resource in storage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->repository->store($request->all());

        return redirect()->route('home');
    }
}
