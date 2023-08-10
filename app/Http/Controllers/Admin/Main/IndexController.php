<?php

namespace App\Http\Controllers\Admin\Main;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke(Category $category, Post $posts, User $users)
    {
        return view('admin.main.index', compact('category', 'posts', 'users'));  
    }
}
