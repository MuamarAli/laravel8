<?php

namespace App\Repository;

use App\Models\Article;

/**
 * Class ArticleRepository
 *
 * @package App\Repository
 *
 * @author Ali, Muamar
 */
class ArticleRepository implements RepositoryInterface
{
    /**
     * @var Article
     */
    private $article;

    /**
     * ArticleRepository constructor.
     *
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Get all articles.
     *
     * @author Ali, Muamar
     *
     * @return Article[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->article->all();
    }

    /**
     * Create article.
     *
     * @param $attributes - data's of the model.
     *
     * @author Ali, Muamar
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->article->create($attributes);
    }

    /**
     * Update article.
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
        return $this->article->findOrFail($id)->update($attributes);
    }

    /**
     * Get single article.
     *
     * @param $id - id of the model.
     *
     * @author Ali, Muamar
     *
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->article->findOrFail($id);
    }

    /**
     * Delete article.
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
        return $this->article->findOrFail($id)->delete();
    }

    /**
     * Get searched article
     *
     * @param string $articleName | Text in search article name field.
     * @param string $tagName | Text in search tag field.
     *
     * @author Soliven, Richard
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getSearchArticle(?string $articleName, ?string $tagName)
    {
        $query = Article::query();
        if (!empty($articleName)) {
            $query
                ->where('title', 'like', "%{$articleName}%");
        }
        if (!empty($tagName)) {
            $query->whereHas('tags', function ($tag) use ($tagName) {
                $tag->where('name', 'like', "%{$tagName}%");
            });
        }

        return $query;
    }
}
