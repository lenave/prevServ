<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller {
    public function set(Request $request) {
        $cookies = $request->all();
        foreach ($cookies as $k => $value) {
            Cookie::queue($k, $value, 10080);
        }
        return response()->json(['status' => Response::HTTP_OK]);
    }
    public function get($name) {
        return [
            $name => Cookie::get($name),
            'token' => Cookie::get('token')
        ];
    }
    public function forget() {
        Cookie::queue('user_id', null, -1);
        Cookie::queue('token', null, -1);
        Cookie::queue('name', null, -1);
        Cookie::queue('login', null, -1);
        Cookie::queue('group_id', null, -1);
        Cookie::queue('_token', null, -1);
    }
}