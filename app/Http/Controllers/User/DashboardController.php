<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
// use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard(Request $request, $id)
    {
        $id = Auth::user();
        $id = $id->id;
        // dd($id);
        // $user = $request->user();
        // $user = $user->id;
        //
        // $id = auth()->id();
        // $profile = User::find($id);
        return view('user.dashboard', [$id]);
    }
}
