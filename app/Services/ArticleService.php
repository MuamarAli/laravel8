<?php

namespace App\Services;

use App\Repository\ArticleRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

/**
 * Class ArticleService
 *
 * @package App\Services
 *
 * @author Ali, Muamar
 */
class ArticleService
{
    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    /**
     * ArticleService constructor.
     *
     * @param ArticleRepository $articleRepository
     *
     * @author Ali, Muamar
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
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
            return $this->articleRepository->all();
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
            $attributes['image'] = $this->upload($attributes['image']);
            $attributes['slug'] = $this->setSlug($attributes['title']);

            return $this->articleRepository->create($attributes);
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
            return $this->articleRepository->update($id, $attributes);
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
            return $this->articleRepository->find($id);
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
            return $this->articleRepository->delete($id);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Upload image.
     *
     * @param UploadedFile $image - image of the model.
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return string
     */
    public function upload(UploadedFile $image): ?string
    {
        try {
            $imageName = sprintf(
                '%s-%s.%s',
                time(),
                pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),
                $image->guessExtension()
            );

            $image->move(public_path('images/articles'), $imageName);

            return $imageName;
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
