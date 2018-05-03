<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'locale.'.
 */
Route::get('locale/{locale}', 'LocaleController@switch')->name('switch');