<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers\Admin
 *
 * @author Ali, Muamar
 */
class HomeController extends Controller
{
    /**
     * Display home.
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
                'admin.home.index'/*,
                ['articles' => $this->articleService->getAll()]*/
            );
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
