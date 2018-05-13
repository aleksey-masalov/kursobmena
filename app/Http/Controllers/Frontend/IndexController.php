<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * IndexController constructor.
     */
    public function __construct()
    {
//        $this->middleware('auth');
//        $this->middleware('permission:create', ['only' => ['create', 'store']]);
//        $this->middleware('permission:edit', ['only' => ['edit', 'update']]);
//        $this->middleware('permission:delete', ['only' => ['show', 'delete']]);
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
//        $request->user()->authorizeRoles(['employee', 'manager']);
//        $request->user()->authorizeRoles('manager');
        return view('frontend.index');
    }
}
