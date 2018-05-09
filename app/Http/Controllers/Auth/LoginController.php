<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Models\User;

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
    protected function redirectTo()
    {
        return homeRoute();
    }

    /**
     * @param Request $request
     * @param User $user
     * @return RedirectResponse|Redirector|null
     */
    protected function authenticated(Request $request, User $user)
    {
        if(config('auth.confirm_email') && !$user->isConfirmedEmail()){
            $this->guard()->logout();

            return redirect($this->redirectPath())->withFlashWarning(trans('strings.frontend.auth.confirmation.resend', ['email' => $user->email]));
        }
    }
}
