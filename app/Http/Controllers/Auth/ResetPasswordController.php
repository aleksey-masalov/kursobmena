<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Auth\PasswordResetRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\Auth\PasswordBroker;

class ResetPasswordController extends Controller
{
    /**
     * ResetPasswordController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @param string $token
     * @return View
     */
    public function showResetForm($token)
    {
        if(empty($token)){
            return redirect()->route('password.request');
        }

        return view('auth.passwords.reset')->with(['token' => $token]);
    }

    /**
     * @param PasswordResetRequest $request
     * @return RedirectResponse
     */
    public function reset(PasswordResetRequest $request)
    {
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        return $response == Password::PASSWORD_RESET
            ? $this->sendResetResponse($response)
            : $this->sendResetFailedResponse($request, $response);
    }

    /**
     * @param PasswordResetRequest $request
     * @return array
     */
    protected function credentials(PasswordResetRequest $request)
    {
        return $request->only('email', 'password', 'password_confirmation', 'token');
    }

    /**
     * @param CanResetPassword $user
     * @param string $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);
        $user->setRememberToken(Str::random(60));
        $user->save();

        $this->guard()->login($user);
    }

    /**
     * @param string $response
     * @return RedirectResponse
     */
    protected function sendResetResponse($response)
    {
        if(config('auth.confirm_email') === false || $this->guard()->user()->isConfirmedEmail()){
            return redirect($this->redirectTo())->withFlashSuccess(trans($response));
        }

        $this->guard()->logout();

        return redirect(route('login'))->withFlashWarning(trans('strings.frontend.auth.confirmation.password_changed'));
    }

    /**
     * @param PasswordResetRequest $request
     * @param string $response
     * @return RedirectResponse
     */
    protected function sendResetFailedResponse(PasswordResetRequest $request, $response)
    {
        return back()->withInput($request->only('email'))->withErrors(['email' => trans($response)]);
    }

    /**
     * @return PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }

    /**
     * @return StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * @return string
     */
    protected function redirectTo()
    {
        return homeRoute();
    }
}
