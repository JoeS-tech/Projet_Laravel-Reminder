<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard($id)
    {
        $id = auth()->id();
        $profile = User::find($id);
        return view('user.dashboard', [$id, $profile]);
    }
}
