<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\StatefulGuard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Auth\UserRegisterRequest;
use App\Events\Auth\UserRegisteredEvent;
use App\Models\User;
use App\Models\Role;

class RegisterController extends Controller
{
    /**
     * RegisterController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @return View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * @param UserRegisterRequest $request
     * @return Response
     */
    public function register(UserRegisterRequest $request)
    {
        $user = $this->create($request->all());

        $this->guard()->login($user);

        return $this->registered($user);
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    protected function registered(User $user)
    {
        event(new UserRegisteredEvent($user));

        if (config('auth.confirm_email') !== false) {
            $this->guard()->logout();

            return redirect($this->redirectTo())->withFlashSuccess(trans('strings.frontend.auth.confirmation.sent'));
        }

        return redirect($this->redirectTo())->withFlashSuccess(trans('strings.frontend.auth.register.success'));
    }

    /**
     * @param array $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user
            ->roles()
            ->attach(Role::where('name', Role::ROLE_TYPE_DEFAULT)->first());

        return $user;
    }

    /**
     * @return string
     */
    protected function redirectTo()
    {
        return homeRoute();
    }

    /**
     * @return StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
