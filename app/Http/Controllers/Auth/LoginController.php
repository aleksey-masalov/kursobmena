<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout']]);
        $this->middleware('auth', ['only' => ['logout']]);
    }

    /**
     * @return string
     */
    public function redirectTo()
    {
        return homeRoute();
    }
}
