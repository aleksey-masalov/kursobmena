<?php

namespace App\Http\Controllers\Locale;

use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;

class LocaleController extends Controller
{
    /**
     * @param string $locale
     * @return RedirectResponse
     */
    public function swap($locale)
    {
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
