<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Http\{RedirectResponse, Request, Response};
use Illuminate\View\View;

/**
 * Class CommentController
 *
 * @package App\Http\Controllers
 *
 * @author Ali, Muamar
 */
class CommentController extends Controller
{
    /**
     * @var CommentService
     */
    private $commentService;

    /**
     * CommentController constructor.
     *
     * @param Comment $model
     * @param CommentService $commentService
     */
    public function __construct(
        Comment $model,
        CommentService $commentService
    )
    {
        $this->model = $model;
        $this->commentService = $commentService;
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
            return view('blog.comment.create');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TagRequest $tagRequest
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return RedirectResponse
     */
    public function store(TagRequest $tagRequest): RedirectResponse
    {
        try {
            $this->commentService->create(
                $tagRequest->validated()
            );

            return redirect()
                ->route('comment.index')
                ->with('status', 'Successfully Inserted!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Comment  $comment
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return View
     */
    public function edit(Comment $comment): View
    {
        try {
            return view('blog.comment.edit', [
                'comment' => $this->commentService->find($comment->id)
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TagRequest  $tagRequest
     * @param  Comment  $comment
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return RedirectResponse
     */
    public function update(
        TagRequest $tagRequest,
        Comment $comment
    ): RedirectResponse
    {
        try {
            $this->commentService->update(
                $comment->id,
                $tagRequest->validated()
            );

            return redirect()
                ->route('comment.index')
                ->with('status', 'Successfully Updated!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comment  $comment
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return RedirectResponse
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        try {
            $this->commentService->delete($comment->id);

            return redirect()
                ->route('comment.index')
                ->with('status', 'Successfully Deleted!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
