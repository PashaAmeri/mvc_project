<?php

namespace App_hospital\core;

use App_hospital\model\User;
use App_hospital\model\Token;

class Auth
{
    public function login($user_id): bool
    {

        $token = Tools::rand_str('token');
        Token::do()->update(['token' => $token[0]], 'user_id', $user_id);

        return Cookie::put('token', $token[0], 120000);
    }

    // public function register($user_id): bool
    // {

    //     $token = Tools::rand_str('token');
    //     Token::do()->create(['token' => $token[0]], 'user_id', $user_id);

    //     return Cookie::put('token', $token, 120000);
    // }

    public function isLogin(): bool
    {
        return Cookie::exists('token');
    }

    public function user()
    {

        $token = Cookie::get('token') ?? '';

        return Token::do()->join(['users.role'], 'users', 'user_id', 'ID', '=', 'token', $token, '=');
    }

    public function logout()
    {
        Cookie::delete('id');
    }

    public static function do(): Auth
    {
        return new static();
    }
}
