<style>
    .tableau{
        border: 2px black solid;
        width: 20%;
        min-height: 200px;
        background-color:red;
        text-align: center;
    }
    .border_cards{
        border: 1px black solid;
        text-align: center;
    }
</style>

@extends('layouts.postit_template')
@section('postit')

@if($columns->isNotEmpty())

    @foreach ($columns as $column)
        <form method="POST" action="{{ @route('user.addCol',[$column->table_id]) }}">
    @endforeach
            @csrf
            <div>
                <input type="text" name="title">
                <input type="submit" name="col" value="Ajouter">
            </div>
        </form>


@else
    <form method="POST" action="{{ @route('user.addCol',[$table]) }}">

        @csrf
        <input type="text" name="title">
        <input type="submit" name="col" value="Ajouter">
    </form>
@endif
@foreach($columns as $column)

    <div class="tableau">
        <div>
            {{ $column->title }}
        </div>
        <div>
            {{ $column->id}}
        </div>

        <div>

            <form method="POST"  action="{{ @route('user.editCol', [$column->id]) }}">
                @csrf
                <input type="text" name="title">
                <input type="submit" name="editCol" value="Edit">
            </form>
            <form method="POST"  action="{{ @route('user.delCol', [$column->id]) }}">
                @csrf
                <input type="submit" name="delCol" value="Supprimer">
            </form>

            <form method="POST"  action="{{ @route('user.addCard', [$column->table_id, $column->id]) }}">
                @csrf
                <input type="textarea" name="todo">
                <input type="submit" name="card" value="+">
            </form>
        </div>
            @foreach ($cards as $card)
            @if($card->column_id == $column->id)
            <div class="border_cards">
                <p> {{ $card->todo }} </p>

                <form method="POST"  action="{{ @route('user.editCard', [$column->table_id, $card->id]) }}">
                    @csrf
                    <input type="textarea" name="todo">
                    <input type="submit" name="editCard" value="Edit">
                </form>

                <form method="POST"  action="{{ @route('user.delCard', [$column->table_id, $card->id]) }}">
                    @csrf
                    <input type="submit" name="delCard" value="Supprimer">
                </form>
                <p> {{ $card->id }} </p>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="{{ '.modalComment'.$card->id }}">+</button>
                <div class="modal fade {{ 'modalComment'.$card->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <form method="POST"  action="{{ @route('user.addCom', [$column->table_id, $column->id, $card->id]) }}">
                                @csrf
                                <input type="textarea" name="comment" placeholder="Commentez">
                                <input type="submit" name="addCard" value="+">
                            </form>

                            @foreach ($comments as $comment)

                            @if($comment->card_id == $card->id)

                                <p> {{ $comment->comment }} </p>
                                <p> {{ $comment->id }} </p>
                                <form method="POST"  action="{{ @route('user.editCom', [$column->table_id, $column->id, $comment->id]) }}">
                                    @csrf
                                    <input type="textarea" name="comment">
                                    <input type="submit" name="editCom" value="Edit">
                                </form>

                                <form method="POST"  action="{{ @route('user.delCom', [$column->table_id, $column->id, $comment->id]) }}">
                                    @csrf
                                    <input type="submit" name="delCom" value="Supprimer">
                                </form>
                            @endif

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    @endforeach

<!-- Large modal -->

@endsection


