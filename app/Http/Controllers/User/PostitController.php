<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Column;
use App\Models\Card;
use App\Models\Table;
use Illuminate\Support\Facades\DB;

class PostitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function postit()
    {
        // $column = Column::all();
        // $card = Card::all();

        return view('user.postit', [
            'columns' => Column::where('user_id', Auth::user()->id)
                ->where('table_id', Table::get('id'))
                ->get(),
        ]);
    }
    public function addCol(Request $request)
    {
        $user = auth()->user();

        $columnId = Table::where('user_id', Auth::user()->id)->get();
        foreach ($columnId as $columntest) {
        }
        // dd($columntest);
        // $columnId = Table::where('user_id', Auth::user()->id)->value('user_id');
        // $columnId = id de la table
        // $columnId = Table::select('id')->where('user_id', Auth::user()->id)->value('name');
        // dd($columnId);
        $column = new Column;
        $column->title = $request->title;
        $column->user_id = $user->id;
        $column->table_id = $columntest->id;

        $column->save();


        return back();
    }

    // public function addCard(Request $request)
    // {
    //     $user = auth()->user();

    //     $cardId = Column::where('table_id', Auth::user()->id)->value('table_id');
    //     // dd($cardId);
    //     $card = new Card;
    //     $card->todo = $request->todo;
    //     $card->user_id = $user->id;
    //     $card->column_id = $cardId;
    //     dd($card);

    //     $card->save();


    //     return view('user.postit', ['cards' => Card::where('column_id', Auth::user()->id)->get(),]);
    // }
}
