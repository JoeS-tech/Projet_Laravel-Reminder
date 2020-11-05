<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

// use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard(Request $request, $id = null)
    {

        // $id = Auth::user()->where;
        // $id = $id->id;

        // dd($id);
        // $id = Auth::where(function ($query) {
        //     $query
        //         ->select('id')
        //         ->from('membership')
        //         ->whereColumn('user_id', 'users.id')
        //         ->orderByDesc('start_date')
        //         ->limit(1);
        // }, 'Pro')->get();
        // dd($id);
        // $user = $request->user();
        // $user = $user->id;
        //
        $id = auth()->id();
        $id = User::find($id);
        $id = $id->id;
        // dd($id);
        return view('user.dashboard');
    }
}
