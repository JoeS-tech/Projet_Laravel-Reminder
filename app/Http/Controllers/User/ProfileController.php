<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Illuminate\Support\Facades\Hash;

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

        $request->validate(
            [
                'name' => 'required|string|min:2',
                'firstname' => 'string|alpha|min:2',
                'lastname' => 'string|alpha|min:1',
                'email' => 'required|email|max:60',
                'password' => 'required|min:8',
                'avatar' => 'mimes:jpg,jpeg,png',
            ]
        );

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
        $profile->password = Hash::make('password');

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
