<?php

return [
    'frontend' => [
        'auth' => [
            'register' => [
                'title' => 'Register',
                'form' => [
                    'name' => 'Name',
                    'email' => 'E-Mail Address',
                    'password' => 'Password',
                    'password_confirm' => 'Confirm Password',
                ]
            ],
            'login' => [
                'title' => 'Login',
                'form' => [
                    'email' => 'E-Mail Address',
                    'password' => 'Password',
                    'remember' => 'Remember Me',
                    'forgot_password' => 'Forgot Your Password?',
                ]
            ],
            'password_email' => [
                'title' => 'Reset Password',
                'form' => [
                    'email' => 'E-Mail Address',
                ]
            ],
            'password_reset' => [
                'title' => 'Reset Password',
                'form' => [
                    'email' => 'E-Mail Address',
                    'password' => 'Password',
                    'password_confirm' => 'Confirm Password',
                ]
            ]
        ]
    ]
];