<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
//        $this->middleware('permission:create', ['only' => ['create', 'store']]);
//        $this->middleware('permission:edit', ['only' => ['edit', 'update']]);
//        $this->middleware('permission:delete', ['only' => ['show', 'delete']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $request->user()->authorizeRoles(['employee', 'manager']);
//        $request->user()->authorizeRoles('manager');
        return view('frontend.index');
    }
}
