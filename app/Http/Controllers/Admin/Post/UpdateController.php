<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Http\Controllers\Admin\Post\BaseController;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $post = $this->service->update($data, $post);
        return redirect(route('admin.posts.index'));
    }
}