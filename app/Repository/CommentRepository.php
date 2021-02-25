<?php

namespace App\Repository;

use App\Models\Comment;

/**
 * Class CommentRepository
 *
 * @package App\Repository
 *
 * @author Ali, Muamar
 */
class CommentRepository implements RepositoryInterface
{
    /**
     * @var Comment
     */
    private $comment;

    /**
     * CommentRepository constructor.
     *
     * @param Comment $comment
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get all comments.
     *
     * @author Ali, Muamar
     *
     * @return Comment[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->comment->all();
    }

    /**
     * Create comment.
     *
     * @param $attributes - data's of the model.
     *
     * @author Ali, Muamar
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->comment->create($attributes);
    }

    /**
     * Update comment.
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
        return $this->comment->findOrFail($id)->update($attributes);
    }

    /**
     * Get single comment.
     *
     * @param $id - id of the model.
     *
     * @author Ali, Muamar
     *
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->comment->findOrFail($id);
    }

    /**
     * Delete comment.
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
        return $this->comment->findOrFail($id)->delete();
    }
}
