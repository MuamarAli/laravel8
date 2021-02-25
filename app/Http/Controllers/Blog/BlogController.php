<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;

/**
 * Class BlogController
 *
 * @package App\Http\Controllers\Blog
 */
class BlogController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('blog.index');
    }
}
