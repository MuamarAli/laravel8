<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\{RedirectResponse, Request, Response};
use Illuminate\View\View;

/**
 * Class ArticleController
 *
 * @package App\Http\Controllers
 *
 * @author Ali, Muamar
 */
class ArticleController extends Controller
{
    /**
     * @var ArticleService
     */
    private $articleService;

    /**
     * ArticleController constructor.
     *
     * @param Article $model
     * @param ArticleService $articleService
     */
    public function __construct(
        Article $model,
        ArticleService $articleService
    )
    {
        $this->model = $model;
        $this->articleService = $articleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return View
     */
    public function index(): View
    {
        try {
            return view(
                'article.index',
                ['articles' => $this->articleService->getAll()]
            );
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return View
     */
    public function create(): View
    {
        try {
            return view('article.create');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $articleRequest
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return RedirectResponse
     */
    public function store(ArticleRequest $articleRequest): RedirectResponse
    {
        try {
            $this->articleService->create(
                $articleRequest->validated()
            );

            return redirect()
                ->route('article.index')
                ->with('status', 'Successfully Inserted!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Article  $article
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return View
     */
    public function show(Article $article): View
    {
        try {
            return view(
                'article.show', [
                'article' => $this->articleService->find($article->id)
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article  $article
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return View
     */
    public function edit(Article $article): View
    {
        try {
            return view('article.edit', [
                'article' => $this->articleService->find($article->id)
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ArticleRequest  $articleRequest
     * @param  Article  $article
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return RedirectResponse
     */
    public function update(
        ArticleRequest $articleRequest,
        Article $article
    ): RedirectResponse
    {
        try {
            $this->articleService->update(
                $article->id,
                $articleRequest->validated()
            );

            return redirect()
                ->route('article.index')
                ->with('status', 'Successfully Updated!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Delete page.
     *
     * @param Article $article
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return View
     */
    public function delete(Article $article): View
    {
        try {
            return view('article.delete', [
                'article' => $this->articleService->find($article->id)
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article  $article
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return RedirectResponse
     */
    public function destroy(Article $article): RedirectResponse
    {
        try {
            $this->articleService->delete($article->id);

            return redirect()
                ->route('article.index')
                ->with('status', 'Successfully Deleted!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
