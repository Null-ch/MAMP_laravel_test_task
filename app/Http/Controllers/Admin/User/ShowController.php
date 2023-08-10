<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        $roles = User::getRoles();
        $role = $roles[$user->role];
        return view('admin.user.show', compact('user', 'role'));
    }
}
