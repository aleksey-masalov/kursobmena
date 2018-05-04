<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * @return View
     */
    public function dashboard()
    {
        return view('backend.dashboard');
    }
}
