<?php

namespace App\Repository;

use App\Models\Tag;

/**
 * Class TagRepository
 *
 * @package App\Repository
 *
 * @author Ali, Muamar
 */
class TagRepository implements RepositoryInterface
{
    /**
     * @var Tag
     */
    private $tag;

    /**
     * TagRepository constructor.
     *
     * @param Tag $tag
     */
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    /**
     * Get all tags.
     *
     * @author Ali, Muamar
     *
     * @return Tag[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->tag->all();
    }

    /**
     * Create tag.
     *
     * @param $attributes - data's of the model.
     *
     * @author Ali, Muamar
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->tag->create($attributes);
    }

    /**
     * Update tag.
     *
     * @param $id - id of the model.
     * @param $attributes - data's of the model.
     *
     * @author Ali, Muamar
     *
     * @return bool
     */
    public function update(int $id, array $attributes)
    {
        return $this->tag->findOrFail($id)->update($attributes);
    }

    /**
     * Get single tag.
     *
     * @param $id - id of the model.
     *
     * @author Ali, Muamar
     *
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->tag->findOrFail($id);
    }

    /**
     * Delete tag.
     *
     * @param $id - id of the model.
     *
     * @author Ali, Muamar
     *
     * @throws \Exception
     *
     * @return bool|null
     */
    public function delete(int $id)
    {
        return $this->tag->findOrFail($id)->delete();
    }
}
