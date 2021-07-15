<?php


namespace App\Repositories;


use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class CategoryRepository
 * @package App\Repositories
 */
class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @var Category
     */
    private $category;

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @param array $input
     * @return mixed
     */
    public function store(array $input)
    {
        return $this->category->create($input);
    }

    /**
     * return all categories
     * @return mixed
     */
    public function all()
    {
        return $this->category->get();
    }
}
