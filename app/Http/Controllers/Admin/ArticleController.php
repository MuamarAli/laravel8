<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Services\ArticleService;
use App\Services\TagService;
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
     * @var TagService
     */
    private $tagService;

    /**
     * ArticleController constructor.
     *
     * @param Article $model
     * @param ArticleService $articleService
     * @param TagService $tagService
     */
    public function __construct(
        Article $model,
        ArticleService $articleService,
        TagService $tagService
    )
    {
        $this->model = $model;
        $this->articleService = $articleService;
        $this->tagService = $tagService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return View
     */
    public function index(Request $request): View
    {
        try {
            if (!empty($request->search)) {
                $search = Article::query()
                    ->where('title', 'like', $request->search)
                    ->paginate($this->model::ARTICLE_ITEMS);
            }

            if (!empty($request->tag)) {
                $search = Article::query()->whereHas('tags', function ($tag) use ($request) {
                    $tag->where('name', 'like', '%' . $request->tag . '%');
                })
                ->paginate($this->model::ARTICLE_ITEMS);
            }

            return view(
                'admin.article.index',
                ['articles' => !empty($search) ? $search : Article::paginate($this->model::ARTICLE_ITEMS)]
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
            return view(
                'admin.article.create',
                ['tags' => $this->tagService->getAll()]
            );
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
     * @param  int  $id
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return View
     */
    public function show(int $id): View
    {
        try {
            return view(
                'admin.article.show', [
                'article' => $this->articleService->find($id)
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return View
     */
    public function edit(int $id): View
    {
        try {
            return view('admin.article.edit', [
                'article' => $this->articleService->find($id),
                'tags' => $this->tagService->getAll()
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ArticleRequest  $articleRequest
     * @param  int  $id
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return RedirectResponse
     */
    public function update(
        ArticleRequest $articleRequest,
        int $id
    ): RedirectResponse
    {
        try {
            $this->articleService
                ->setArticle($this->articleService->find($id))
                ->update($articleRequest->validated()
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
     * @param int $id
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return View
     */
    public function delete(int $id): View
    {
        try {
            return view('admin.article.delete', [
                'article' => $this->articleService->find($id)
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->articleService->delete($id);

            return redirect()
                ->route('article.index')
                ->with('status', 'Successfully Deleted!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
