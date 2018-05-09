<?php

return [
    'general' => [
        'toggle_navigation' => 'Toggle navigation',
        'all_rights_reserved' => 'All rights reserved'
    ],
    'backend' => [
        'user' => [
            'member_since' => 'Member since',
            'status' => [
                'online' => 'Online'
            ]
        ]
    ],
    'frontend' => [
        'auth' => [
            'confirmation' => [
                'sent'              => 'Thanks for signing up! Please check your email.',
                'resent'            => 'Confirmation email has been sent.',
                'confirmed'         => 'Your email has been successfully confirmed.',
                'already_confirmed' => 'Your email is already confirmed.',
                'mismatch'          => 'Your confirmation code does not match.',
                'not_exist'         => 'Your email does not exist.',
                'resend'            => 'Your email is not confirmed. Please click the confirmation button in your email. <a href="' . route('email.confirm.resend') . '?email=:email">Resend the confirmation email.</a>',
                'password_changed'  => 'Password changed successfully. Please confirm your email',
            ],
        ]
    ]
];