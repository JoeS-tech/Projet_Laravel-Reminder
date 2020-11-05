<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile()
    {
        return view('user.profile');
    }
    public function sendProfile(Request $request)
    {
        $id = auth()->id();
        $profile = User::find($id);

        $avatar = $request->avatar;

        if (($avatarPath = $avatar->store('public/assets/uploads'))) {
            $profile->avatar = $avatarPath;
        } else {
            $profile->avatar = '';
        }

        $profile->name = $request->name;
        $profile->firstname = $request->firstname;
        $profile->lastname = $request->lastname;
        $profile->email = $request->email;
        $profile->password = $request->password;

        $profile->save();

        // dd($user);
        // dd($profile);

        // $profile = new User();
        // $profile->name = $request->name;
        // $profile->firstname = $request->firstname;
        // $profile->lastname = $request->lastname;
        // $profile->email = $request->email;
        // $profile->password = $request->password;
        // $profile->save();

        return view('welcome');
    }
}
