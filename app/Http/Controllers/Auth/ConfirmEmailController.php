<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Events\Auth\UserRequestedConfirmEmailEvent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class ConfirmEmailController extends Controller
{
    /**
     * @param string $confirmationCode
     * @return RedirectResponse|Redirector
     */
    public function confirm($confirmationCode)
    {
        $user = User::where(DB::raw('BINARY confirmation_code'), $confirmationCode)->first();

        if (!$user) {
            return redirect(homeRoute())->withFlashDanger(trans('strings.frontend.auth.confirmation.mismatch'));
        }

        if ($user->confirmed == true) {
            return redirect(homeRoute())->withFlashWarning(trans('strings.frontend.auth.confirmation.already_confirmed'));
        }

        $this->confirmEmail($user);

        return redirect(route('login'))->withFlashSuccess(trans('strings.frontend.auth.confirmation.confirmed'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function resend(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect(homeRoute())->withFlashDanger(trans('strings.frontend.auth.confirmation.not_exist'));
        }

        if ($user->confirmed == true) {
            return redirect(homeRoute())->withFlashWarning(trans('strings.frontend.auth.confirmation.already_confirmed'));
        }

        event(new UserRequestedConfirmEmailEvent($user));

        return redirect(homeRoute())->withFlashSuccess(trans('strings.frontend.auth.confirmation.resent'));
    }

    /**
     * @param User $user
     * @return void
     */
    private function confirmEmail(User $user)
    {
        $user->confirmation_code = null;
        $user->confirmed = true;
        $user->save();
    }
}
