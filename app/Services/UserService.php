<?php

namespace App\Services;

use App\Repository\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

/**
 * Class UserService
 *
 * @package App\Services
 *
 * @author Ali, Muamar
 */
class UserService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserService constructor.
     *
     * @param UserRepository $userRepository
     *
     * @author Ali, Muamar
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get all.
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return Collection
     */
    public function getAll()
    {
        try {
            return $this->userRepository->all();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Create.
     *
     * @param $attributes - data's of the model.
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return mixed
     */
    public function create($attributes)
    {
        try {
            $attributes['slug'] = $this->setSlug($attributes['name']);

            return $this->userRepository->create($attributes);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Update.
     *
     * @param $id - id of the model.
     * @param $attributes - data's of the model.
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return bool
     */
    public function update($id, $attributes)
    {
        try {
            $attributes['slug'] = $this->setSlug($attributes['name']);

            return $this->userRepository->update($id, $attributes);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Get data.
     *
     * @param $id - id of the model.
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return mixed
     */
    public function find(int $id)
    {
        try {
            return $this->userRepository->find($id);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Delete data.
     *
     * @param $id - id of the model.
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return bool|null
     */
    public function delete(int $id)
    {
        try {
            return $this->userRepository->delete($id);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Set slug.
     *
     * @param string $value - pass value.
     *
     * @author Ali, Muamar
     *
     * @return string
     */
    public function setSlug(string $value): ?string
    {
        try {
            return Str::slug($value);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
