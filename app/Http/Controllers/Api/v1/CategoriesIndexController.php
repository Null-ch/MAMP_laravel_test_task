<?php

namespace App\Http\Controllers\Api\v1;


use App\Models\Post;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\BaseController;

class CategoriesIndexController extends BaseController
{
    public function __invoke(Request $request)
    {
        $categories = Category::all();
        if ($categories->isEmpty()) {
            $data = ["status" => "404", 'message' => 'Данные отсутствуют'];
            return response()->json($data);
        } else {
            $data = ["status" => "200", 'Все категории' => $categories];
            return response()->json($data);
        }
    }
}
