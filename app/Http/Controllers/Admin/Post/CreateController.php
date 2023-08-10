<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use App\Http\Controllers\Admin\Post\BaseController;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));  
    }
}
