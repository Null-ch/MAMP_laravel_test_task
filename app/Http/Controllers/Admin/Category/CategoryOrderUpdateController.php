<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Post\BaseController;
use App\Models\Category;

class CategoryOrderUpdateController extends BaseController
{
    public function __invoke(Request $request)
    {
        $categories = Category::all();

        foreach ($categories as $post) {
            foreach ($request->order as $order) {
                if ($order['id'] == $post->id) {
                    $post->update(['order' => $order['position']]);
                }
            }
        }
        return response('Update Successfully.', 200);
    }
}
