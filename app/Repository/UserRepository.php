<?php

namespace App\Repository;

use App\Models\User;

/**
 * Class UserRepository
 *
 * @package App\Repository
 *
 * @author Ali, Muamar
 */
class UserRepository implements RepositoryInterface
{
    /**
     * @var User
     */
    private $user;

    /**
     * UserRepository constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get all users.
     *
     * @author Ali, Muamar
     *
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->user->all();
    }

    /**
     * Create user.
     *
     * @param $attributes - data's of the model.
     *
     * @author Ali, Muamar
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->user->create($attributes);
    }

    /**
     * Update user.
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
        return $this->user->findOrFail($id)->update($attributes);
    }

    /**
     * Get single user.
     *
     * @param $id - id of the model.
     *
     * @author Ali, Muamar
     *
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->user->findOrFail($id);
    }

    /**
     * Delete user.
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
        return $this->user->findOrFail($id)->delete();
    }
}
