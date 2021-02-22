<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\Request;

/**
 * Class ArticleController
 *
 * @package App\Http\Controllers
 */
class ArticleController extends BaseCrudController
{
    /**
     * @var ArticleService
     */
    private $articleService;

    private $articleRequest;

    /**
     * ArticleController constructor.
     *
     * @param Article $model
     * @param ArticleService $articleService
     */
    public function __construct(
        Article $model,
        ArticleService $articleService,
        ArticleRequest $articleRequest
    )
    {
        $this->model = $model;
        $this->articleService = $articleService;
        $this->articleRequest = $articleRequest;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('article.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storee()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function showw(Article $article)
    {
        dd('show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        dd('edit');
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function updatee(Request $request, Article $article)
    {
        dd('update');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroyy(Article $article)
    {
        dd('destroy');
        //
    }

    /**
     * @return array|mixed
     */
    public function inputStore()
    {
        return $this->articleService->create(
            $this->articleRequest->validated()
        );
    }

    /**
     * @return array|mixed
     */
    public function inputUpdate()
    {
        return \request()->only([
            'title',
            'summary',
            'content',
            'status',
            'image',
            'slug',
        ]);
    }
}
