<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Support\Facades\DB;

// use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(Request $request)
    {

        $table = DB::table('tables')->get();

        // dd($table);
        // $id = auth()->id();
        // $id = User::find($id);
        // $id = $id->id;
        // // dd($id);
        return view('user.dashboard', ['tables' => table::all()]);
    }


    public function sendTable(Request $request)
    {
        $id = auth()->user();
        $table = Table::all();
        $table = new table;
        $table->user_id = $request->user_id;

        $table->save();

        return view('home');
    }
}
