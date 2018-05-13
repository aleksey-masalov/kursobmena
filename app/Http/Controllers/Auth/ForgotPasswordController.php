<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Auth\PasswordForgotRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Contracts\Auth\PasswordBroker;

class ForgotPasswordController extends Controller
{
    /**
     * ForgotPasswordController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @return View
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    /**
     * @param PasswordForgotRequest $request
     * @return RedirectResponse
     */
    public function sendResetLinkEmail(PasswordForgotRequest $request)
    {
        $response = $this->broker()->sendResetLink($request->only('email'));

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($response)
            : $this->sendResetLinkFailedResponse($response);
    }

    /**
     * @param string $response
     * @return RedirectResponse
     */
    protected function sendResetLinkResponse($response)
    {
        return back()->withFlashSuccess(trans($response));
    }

    /**
     * @param string $response
     * @return RedirectResponse
     */
    protected function sendResetLinkFailedResponse($response)
    {
        return back()->withErrors(['email' => trans($response)]);
    }

    /**
     * @return PasswordBroker
     */
    protected function broker()
    {
        return Password::broker();
    }
}
