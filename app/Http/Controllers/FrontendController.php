<?php

namespace App\Http\Controllers;

class FrontendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.welcome');
    }

    public function home()
    {
        return view('layouts.frontend.home');
    }
}
