<?php

/**
 * Auth Controllers
 */
Route::get('login', 'LoginController@showLoginForm')->name('login');
Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout')->name('logout');

Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'RegisterController@register');

Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'ResetPasswordController@reset');

Route::get('email/confirm/send/{confirmationCode}', 'ConfirmEmailController@confirm')->name('email.confirm');
Route::get('email/confirm/resend', 'ConfirmEmailController@resend')->name('email.confirm.resend');
