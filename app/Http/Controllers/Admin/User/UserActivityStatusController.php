<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserActivityStatusController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->mode == "true") {
            $userActivity = DB::table('users')->where('id', '=', $request->user_id)->update(array('isActive' => 1));
        } else {
            $userActivity = DB::table('users')->where('id', '=', $request->user_id)->update(array('isActive' => 0));
        }
    }
}
