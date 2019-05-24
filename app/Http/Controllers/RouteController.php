<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class RouteController extends Controller {

    public function ticketShow($ticket) {
        return view('ticket', compact('ticket'));
    }
}