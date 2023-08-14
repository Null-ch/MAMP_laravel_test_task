<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Admin\Post\BaseController;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::all();

        return view('admin.post.index', compact('posts'));  
    }
}
