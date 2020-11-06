<?php

namespace App\Http\Controllers\User;

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
}
