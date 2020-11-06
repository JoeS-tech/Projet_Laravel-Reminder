<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Column;
use App\Models\Card;
use Illuminate\Support\Facades\DB;

class PostitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function postit()
    {
        $column = Column::all();
        $card = Card::all();

        return view('user.postit', ['columns' => column::all(), 'cards' => card::all(),]);
    }
    public function addCol(Request $request)
    {
        $user = auth()->user();

        $table = new Column;
        $table->title = $request->title;
        $table->table_id = $user->id;
        $table->save();


        return view('user.postit', ['columns' => Column::where('table_id', Auth::user()->id)->get(),]);
    }

    // public function sendTable(Request $request)
    // {
    //     $user = auth()->user();
    //     $table = new Table;
    //     $table->title = $request->title;
    //     $table->user_id = $user->id;

    //     $table->save();

    //     return view('user.dashboard', ['tables' => Table::all()]);
    // }
}
