<?php

namespace App\Http\Controllers\Admin\Post;



use App\Models\Post;
use Laravel\Dusk\Dusk;
use App\Http\Requests\Admin\Post\StroreRequest;
use App\Http\Controllers\Admin\Post\BaseController;


class StoreController extends BaseController
{
    public function __invoke(StroreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('admin.posts.index');
    }
}
