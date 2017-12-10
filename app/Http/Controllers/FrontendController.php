<?php

namespace App\Http\Controllers;

use App\Feature;
use App\Resource;

class FrontendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Resource::whereFeatured(1)->orderby('id', 'desc')->get();
        $desc      = Feature::whereName(json_encode(['nameEn' => 'Description','nameAr' => 'الوصف']))->first();

        return view('frontend.welcome', compact('resources', 'desc'));
    }
}
