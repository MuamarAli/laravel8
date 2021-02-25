<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\{RedirectResponse, Request, Response};
use Illuminate\View\View;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 *
 * @author Ali, Muamar
 */
class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * UserController constructor.
     *
     * @param User $model
     * @param UserService $userService
     */
    public function __construct(
        User $model,
        UserService $userService
    )
    {
        $this->model = $model;
        $this->userService = $userService;
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
                'admin.user.show', [
                'user' => $this->userService->find($id)
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
            return view('admin.user.edit', 
                ['user' => $this->userService->find($id)]
            );
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserRequest  $userRequest
     * @param  int  $id
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return RedirectResponse
     */
    public function update(
        UserRequest $userRequest,
        int $id
    ): RedirectResponse
    {
        try {
            $this->userService->update(
                $id,
                $userRequest->validated()
            );
            
            return redirect()
                ->back()
                ->with('status', 'Successfully Updated!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
