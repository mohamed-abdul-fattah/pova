<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BaklySystems\Hydrogen\Http\Controllers\UsersController as BaklyUsersController;

class UsersController extends BaklyUsersController
{
    /**
     * Show user's profile page.
     *
     * @return Response
     */
    public function profile()
    {
        $user = auth()->user();

        return view('frontend.users.profile', compact('user'));
    }

    /**
     * Show user's settings page.
     *
     * @return Response
     */
    public function settings()
    {
        $user = auth()->user();

        return view('frontend.users.edit', compact('user'));
    }
}
