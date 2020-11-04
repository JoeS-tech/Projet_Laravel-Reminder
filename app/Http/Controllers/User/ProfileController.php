<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

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
        $profile = new User();
        $profile->name = $request->name;
        $profile->firstname = $request->firstname;
        $profile->lastname = $request->lastname;
        $profile->email = $request->email;
        $profile->password = $request->password;
        $profile->save();

        return view('home');
    }
}
