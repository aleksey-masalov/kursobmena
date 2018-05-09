<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * ResetPasswordController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @return string
     */
    protected function redirectTo()
    {
        return homeRoute();
    }

    /**
     * @param string $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetResponse($response)
    {
        if(config('auth.confirm_email') && !$this->guard()->user()->isConfirmedEmail()) {
            $this->guard()->logout();

            return redirect(route('login'))->withFlashWarning(trans('strings.frontend.auth.confirmation.password_changed'));
        }

        return redirect($this->redirectPath())->withFlashSuccess(trans($response));
    }
}
