<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\v1\BaseController as BaseController;

class LoginController extends BaseController
{
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->login,
            'password' => $request->password,
        ];

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();
            $user->api_token = Str::random(60);
            $user->save();

            return ['errors' => null, $user];
        }

        return response()->json(['errors' => 'Ошибка авторизации'], 401);
    }
}