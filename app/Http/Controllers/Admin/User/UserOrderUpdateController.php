<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Post\BaseController;
use App\Models\User;

class UserOrderUpdateController extends BaseController
{
    public function __invoke(Request $request)
    {
        $users = User::all();

        foreach ($users as $post) {
            foreach ($request->order as $order) {
                if ($order['id'] == $post->id) {
                    $post->update(['order' => $order['position']]);
                }
            }
        }
        return response('Update Successfully.', 200);
    }
}
