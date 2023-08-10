<?php

namespace App\Http\Controllers\Api\v1;


use App\Models\Post;

use App\Http\Controllers\API\v1\BaseController;
use Illuminate\Http\Request;

class PostsBySlugController extends BaseController
{
    public function __invoke(Request $request)
    {
        $posts = Post::all();
        if ($posts->isEmpty()) {
            $data = ["status" => "404", 'message' => 'Данные отсутствуют'];
            return response()->json($data);
        } elseif ($request->slug == null && !($posts->isEmpty())) {
            $posts = Post::paginate(10);
            $data = ["status" => "200", 'Все статьи' => $posts];
            return response()->json($data);
        } else {
            $postsByCategory = $posts->where('slug', '=', $request->slug);
            $data = ["status" => "200", 'Все статьи' => $postsByCategory];
            return response()->json($data);
        }
    }
}
