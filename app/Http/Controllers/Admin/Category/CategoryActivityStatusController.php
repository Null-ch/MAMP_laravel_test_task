<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryActivityStatusController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->mode == "true") {
            $postActivity = DB::table('categories')->where('id', '=', $request->categoryId)->update(array('isActive' => 1));
        } else {
            $postActivity = DB::table('categories')->where('id', '=', $request->categoryId)->update(array('isActive' => 0));
        }
    }
}
