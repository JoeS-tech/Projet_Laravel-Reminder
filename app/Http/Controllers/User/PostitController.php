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
        return view(
            'user.dashboard',
            [
                'cards' => Card::where('column_id', Auth::user()->id)->get(),
                'columns' => Column::where('table_id', Auth::user()->id)->get(),
            ]
        );
    }
    public function addCard(Request $request)
    {
        $column = Column::all();

        $user = auth()->user();
        $table = new Card;
        $table->title = $request->title;
        $table->column_id = $column->id;

        $table->save();


        return view('user.postit', ['columns' => column::all(), 'cards' => card::all(),]);
    }
}
