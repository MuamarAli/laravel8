<?php

namespace App\Services;

use App\Repository\TagRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

/**
 * Class TagService
 *
 * @package App\Services
 *
 * @author Ali, Muamar
 */
class TagService
{
    /**
     * @var TagRepository
     */
    private $tagRepository;

    /**
     * TagService constructor.
     *
     * @param TagRepository $tagRepository
     *
     * @author Ali, Muamar
     */
    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
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
            return $this->tagRepository->all();
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

            return $this->tagRepository->create($attributes);
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
            return $this->tagRepository->update($id, $attributes);
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
            return $this->tagRepository->find($id);
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
            return $this->tagRepository->delete($id);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Set slug.
     *
     * @param string $title - title of the model.
     *
     * @author Ali, Muamar
     *
     * @return string
     */
    public function setSlug(string $title): ?string
    {
        try {
            return Str::slug($title);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
