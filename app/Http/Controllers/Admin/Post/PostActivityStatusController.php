<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PostActivityStatusController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->mode == "true") {
            $postActivity = DB::table('posts')->where('id', '=', $request->postId)->update(array('isActive' => 1));
        } else {
            $postActivity = DB::table('posts')->where('id', '=', $request->postId)->update(array('isActive' => 0));
        }
    }
}
