<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * RegisterController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @return string
     */
    public function redirectTo()
    {
        return homeRoute();
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
     * @param array $data
     * @return Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
}
