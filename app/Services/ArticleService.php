<?php

namespace App\Services;

use App\Models\Article;
use App\Repository\ArticleRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
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
     * @var Article
     */
    private $article;

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
     * Set article.
     *
     * @param Article $article
     *
     * @author Ali, Muamar
     *
     * @return ArticleService
     */
    public function setArticle(Article $article): ArticleService
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article.
     *
     * @author Ali, Muamar
     *
     * @return Article
     */
    public function getArticle(): Article
    {
        return $this->article;
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
            if (!empty($attributes['image'])) {
                $attributes['image'] = $this->uploadImage($attributes['image']);
            }
            $attributes['status'] = $this->isStatusCheck($attributes);
            $attributes['slug'] = $this->setSlug($attributes['title']);
            $attributes['author_id'] = auth()->id();

            return $this->articleRepository->create($attributes);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Update.
     *
     * @param $attributes - data's of the model.
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return bool
     */
    public function update($attributes)
    {
        try {
            if (!empty($attributes['image'])) {
                $attributes['image'] = $this->updateImage($attributes['image']);
            }

            return $this->articleRepository->update(
                $this->article->id,
                $attributes
            );
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
    public function uploadImage(UploadedFile $image): ?string
    {
        try {
            $imageName = sprintf(
                '%s-%s.%s',
                time(),
                $this->setSlug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)),
                $image->guessExtension()
            );

            $image->move(public_path('images/articles'), $imageName);

            return $imageName;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Update image.
     *
     * @param UploadedFile $image - image of the model.
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return string
     */
    public function updateImage(UploadedFile $image): ?string
    {
        try {
            $this->deleteFile();

            return $this->uploadImage($image);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Set slug.
     *
     * @param string $value - passed value.
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

    /**
     * Delete file.
     *
     * @author Ali, Muamar
     *
     * @return bool
     */
    public function deleteFile()
    {
        try {
            $filePath = sprintf('%s/%s',
                public_path('images/articles'),
                $this->article->image
            );

            return File::delete($filePath);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Check status.
     *
     * @param $attributes
     *
     * @author Ali, Muamar
     *
     * @return bool
     */
    public function isStatusCheck($attributes)
    {
        try {
            return !empty($attributes['status']) ? true : false;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
