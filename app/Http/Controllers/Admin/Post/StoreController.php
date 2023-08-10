<?php

namespace App\Http\Controllers\Admin\Post;



use App\Models\Post;
use App\Http\Requests\Admin\Post\StroreRequest;
use App\Http\Controllers\Admin\Post\BaseController;


class StoreController extends BaseController
{
    public function __invoke(StroreRequest $request)
    {
        $data = $request->validated();

        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $request->slug); //Removed all Special Character and replace with hyphen
        $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
        $slug = strtolower($final_slug);
        $data['slug'] = $slug;
    
        $this->service->store($data);

        return redirect()->route('admin.posts.index');
    }
}
