<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
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

    /**
     * Update user settings.
     *
     * @param \Illuminate\Http\Request  $request
     * @return Response
     */
    public function updateSettings(Request $request)
    {
        $this->validate($request, [
            'name'         => 'required|string|max:255',
            'email'        => 'string|nullable|email|max:255',
            'email'        =>  Rule::unique('users')->ignore(auth()->id()),
            'phone'        => 'required|numeric',
            'company_name' => 'string|nullable',
            'entity'       => 'string|in:individual,company',
            'profile'      => 'image'
        ]);

        $user = auth()->user();
        $user->update($request->only('name', 'email', 'phone'));

        // Update user porvider details.
        if ($user->provider) {
            $user->provider()->update([
                'entity'       => $request->entity,
                'company_name' => ($request->company_name) ? $request->company_name : ''
            ]);
        }

        // Update profile photo.
        if ($request->hasFile('profile')) {
            if ($user->profilePhoto) {
                $user->deletePhoto('images/users', $user->profilePhoto);
            }
            $user->uploadPhoto($request->file('profile'), $phototypeId = 0, $path = 'images/users/', $cover = 1, 300, 300);
        }

        return redirect('/profile');
    }

    /**
     * Update user's password.
     *
     * @param \Illuminate\Http\Request  $request
     * @return Response
     */
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'oldPassword' => 'required|string|min:6',
            'password'    => 'required|string|min:6|confirmed'
        ]);

        $user  = auth()->user();
        $check = Hash::check($request->oldPassword, $user->password);

        if (!$check) {
            return redirect()->back()->withErrors(['oldPassword' => 'The current password is wrong!.']);
        }
        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return redirect('/profile');
    }
}
