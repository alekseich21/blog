<?php


namespace App\Repositories;


use App\Models\Tag;
use App\Repositories\Interfaces\TagRepositoryInterface;

/**
 * Class TagRepository
 * @package App\Repositories
 */
class TagRepository implements TagRepositoryInterface
{
    /**
     * @var Tag
     */
    private $tag;

    /**
     * TagRepository constructor.
     * @param Tag $tag
     */
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function store($request)
    {
        $data = $request->all();

        return $this->tag->create($data);
    }

    /**
     * Show all tags
     * @return mixed
     */
    public function all()
    {
        return $this->tag->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function showTag($id)
    {
        $tag = $this->tag->where('id', $id)->firstOrFail();

        return $tag->posts()->orderBy('id', 'desc')->get();
    }
}
