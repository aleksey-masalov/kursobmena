<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Auth\UserLoginRequest;
use App\Events\Auth\UserLoggedInEvent;

class LoginController extends Controller
{
    use ThrottlesLogins;

    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout']]);
        $this->middleware('auth', ['only' => ['logout']]);
    }

    /**
     * @return View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * @param UserLoginRequest $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function login(UserLoginRequest $request)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);
        $this->sendFailedLoginResponse();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect($this->redirectTo());
    }

    /**
     * @param UserLoginRequest $request
     * @return bool
     */
    protected function attemptLogin(UserLoginRequest $request)
    {
        return $this->guard()->attempt($this->credentials($request), $request->filled('remember'));
    }

    /**
     * @param UserLoginRequest $request
     * @return array
     */
    protected function credentials(UserLoginRequest $request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * @param UserLoginRequest $request
     * @return RedirectResponse
     */
    protected function sendLoginResponse(UserLoginRequest $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($this->guard()->user());
    }

    /**
     * @param $user
     * @return RedirectResponse
     */
    protected function authenticated($user)
    {
        event(new UserLoggedInEvent($user));

        if (config('auth.confirm_email') === false || $user->isConfirmedEmail()) {
            return redirect()->intended($this->redirectTo());
        }

        $this->guard()->logout();

        return redirect($this->redirectTo())->withFlashWarning(trans('strings.frontend.auth.confirmation.resend', ['email' => $user->email]));
    }

    /**
     * @return void
     * @throws ValidationException
     */
    protected function sendFailedLoginResponse()
    {
        throw ValidationException::withMessages(['email' => [trans('auth.login.failed')]]);
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

    /**
     * @return string
     */
    public function username()
    {
        return userLogin();
    }
}
