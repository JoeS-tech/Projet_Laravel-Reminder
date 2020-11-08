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
    public function postit($id_tables)
    {
        // $column = Column::all();
        // $card = Card::all();
        // DB::table('users')
        //     ->join('labdetails2', 'users.lab_name', '=', 'labdetails2.lab_name')
        //     ->select('labdetails2.lab_name', 'labdetails2.pc_name')
        //     ->get();
        // $test2 = Column::select('table_id')->get();

        // $test = Table::all()->toArray();
        // $test3 = reset($test);
        // $test4 = reset($test3);

        // dd($id);

        // $columnId = Column::where('table_id', Table::select('id')->get());
        // foreach ($columnId as $columnIdpush) {
        // }
        // $test = $test->id;
        // $test = Table::select('id')->get();
        // $table_id = Column::select('table_id')->where('table_id', Table::select('id'))->get();
        // dd($table_id);

        // $user = Auth::user()->id;

        // $tab_arr = Table::all()->toArray();
        // $tab_id = array_column($tab_arr, 'id');

        // $col_arr = Column::all()->toArray();
        // $col_tabid = array_column($col_arr, 'table_id');
        // dd($col_tabid);


        // $column1 = Column::where('user_id', Auth::user()->id)->firstOrFail();
        // dd($column1);
        // $column1->table()->column()->get();




        // $tables = table::find(9);
        // $tablecolumns = $tables->columns;

        // $tables = table::find();
        // $tablecolumnsTwo = $tables->columns;

        // $tables = table::find();
        // $tablecolumnsThree = $tables->columns;

        //dd($tables->columns);

        // return view(
        //     'user.postit',
        //     compact(' $tablecolumns')
        // );
        // return view(
        //     'user.postit',
        //     [
        //         'columns' => Column::where('user_id', Auth::user()->id)
        // ->orWhere($col_tabid, $tab_id)
        // //         ->get(),
        //     ]
        // );

        // $test = Table::select('id');
        // dd($test);
        // dd($id_tables);
        // $tableselect=Table::select()
        return view(
            'user.postit',
            [
                'columns' => Column::where('user_id', Auth::user()->id)
                    ->where('table_id', $id_tables)
                    ->get(),
            ]
        );
    }
    public function addCol(Request $request)
    {
        $user = auth()->user();

        $columnId = Table::where('user_id', Auth::user()->id)->get();
        foreach ($columnId as $columnIdpush) {
        }
        // dd($columnIdpush);
        // $columnId = Table::where('user_id', Auth::user()->id)->value('user_id');
        // $columnId = id de la table
        // $columnId = Table::select('id')->where('user_id', Auth::user()->id)->value('name');
        // dd($columnId);
        $column = new Column;
        $column->title = $request->title;
        $column->user_id = $user->id;
        $column->table_id = $columnIdpush->id;

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
