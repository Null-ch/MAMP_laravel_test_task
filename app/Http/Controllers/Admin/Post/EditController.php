<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Admin\Post\BaseController;

class EditController extends BaseController
{
    public function __invoke(Post $post)
    {
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'categories'));  
    }
}
