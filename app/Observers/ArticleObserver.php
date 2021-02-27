<?php

namespace App\Observers;

use App\Models\Article;
use App\Services\ArticleService;

class ArticleObserver
{
    /**
     * @var ArticleService
     */
    private $articleService;

    /**
     * ArticleService constructor.
     *
     * @param ArticleService $articleService
     *
     * @author Soliven, Richard
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * Handle the Article "creating" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function creating(Article $article)
    {
        $article
            ->setAttribute('status', $this->articleService->isStatusCheck($article->getAttribute('status')))
            ->setAttribute('slug', $this->articleService->setSlug($article->getAttribute('title')))
            ->setAttribute('author_id', auth()->id());
    }

    /**
     * Handle the Article "updating" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function updating(Article $article)
    {
        $article
            ->setAttribute('status', $this->articleService->isStatusCheck($article->getAttribute('status')))
            ->setAttribute('slug', $this->articleService->setSlug($article->getAttribute('title')));
    }
}
