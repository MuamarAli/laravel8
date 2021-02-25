<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers\Blog
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('home.index');
    }
}
