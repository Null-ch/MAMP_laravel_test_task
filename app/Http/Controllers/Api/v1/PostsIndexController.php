<?php

namespace App\Http\Controllers\Api\v1;


use App\Models\Post;

use App\Http\Controllers\API\v1\BaseController;
use Illuminate\Http\Request;

class PostsIndexController extends BaseController
{
    public function __invoke(Request $request)
    {
        $posts = Post::paginate(10);
        $postsPages = $posts->lastPage();
        if ($posts->isEmpty()) {
            $data = ["status" => "404", 'message' => 'Данные отсутствуют'];
            return response()->json($data);
        } elseif ($request->page == null && !($posts->isEmpty())) {
            $posts = Post::paginate(10);
            $data = ["status" => "200", 'Все статьи' => $posts];
            return response()->json($data);
        } elseif ($request->page > $postsPages || $request->page < 1) {
            $data = ["status" => "404", 'message' => 'Страницы не существует'];
            return response()->json($data);
        } else {
            $posts = Post::paginate(10, ['*'], 'page', $request->page);
            $data = ["status" => "200", 'Все статьи' => $posts];
            return response()->json($data);
        }
    }
}
