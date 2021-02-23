<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\{RedirectResponse, Request, Response};
use Illuminate\View\View;

/**
 * Class TagController
 *
 * @package App\Http\Controllers
 *
 * @author Ali, Muamar
 */
class TagController extends Controller
{
    /**
     * @var TagService
     */
    private $tagService;

    /**
     * TagController constructor.
     *
     * @param Tag $model
     * @param TagService $tagService
     */
    public function __construct(
        Tag $model,
        TagService $tagService
    )
    {
        $this->model = $model;
        $this->tagService = $tagService;
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
                'admin.tag.index',
                ['tags' => $this->tagService->getAll()]
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
            return view('admin.tag.create');
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
            $this->tagService->create(
                $tagRequest->validated()
            );

            return redirect()
                ->route('tag.index')
                ->with('status', 'Successfully Inserted!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Tag  $tag
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return View
     */
    public function show(Tag $tag): View
    {
        try {
            return view(
                'admin.tag.show', [
                'tag' => $this->tagService->find($tag->id)
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tag  $tag
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return View
     */
    public function edit(Tag $tag): View
    {
        try {
            return view('admin.tag.edit', [
                'tag' => $this->tagService->find($tag->id)
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TagRequest  $tagRequest
     * @param  Tag  $tag
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return RedirectResponse
     */
    public function update(
        TagRequest $tagRequest,
        Tag $tag
    ): RedirectResponse
    {
        try {
            $this->tagService->update(
                $tag->id,
                $tagRequest->validated()
            );

            return redirect()
                ->route('tag.index')
                ->with('status', 'Successfully Updated!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Delete page.
     *
     * @param Tag $tag
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return View
     */
    public function delete(Tag $tag): View
    {
        try {
            return view('admin.tag.delete', [
                'tag' => $this->tagService->find($tag->id)
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tag  $tag
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return RedirectResponse
     */
    public function destroy(Tag $tag): RedirectResponse
    {
        try {
            $this->tagService->delete($tag->id);

            return redirect()
                ->route('tag.index')
                ->with('status', 'Successfully Deleted!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
