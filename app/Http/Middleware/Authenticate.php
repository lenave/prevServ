<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guard)
    {
        if (!empty(Cookie::get('token')) && !empty(Cookie::get('user_id'))) {
            /*try {
                $client = new Client();
                $client->request('GET', env('API_URL') . '/api/covenants?user=' . Cookie::get('user_id'), [
                    'headers' => ['Authorization' => Cookie::get('token')]
                ]);
            } catch (BadResponseException $e) {
                if ($e->getCode() == 401) {
                    Cookie::queue('user_id', null, -1);
                    Cookie::queue('token', null, -1);
                    Cookie::queue('name', null, -1);
                    Cookie::queue('login', null, -1);
                    Cookie::queue('group_id', null, -1);
                    Cookie::queue('_token', null, -1);
                    return redirect()->route('login');
                }
            }*/
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
