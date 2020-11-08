<style>
    .tableau{
        border: 2px black solid;
        width: 20%;
        min-height: 200px;
        background-color:red;
    }
</style>

@extends('layouts.postit_template')
@section('postit')

@foreach ($columns as $column)
<form method="POST" action="{{ @route('user.addCol',[$column->table_id]) }}">
@endforeach
   @csrf
    <input type="text" name="title">
    <input type="submit" name="col" value="Ajouter">
</form>
@foreach($columns as $column)

    <div class="tableau">
        <div>
            {{ $column->title }}
        </div>
        <div>
            {{ $column->id}}
        </div>
        <div>
            {{-- <form method="POST" >
                {{-- action="{{ @route('user.addCard') }}"
                @csrf
                <input type="textarea" name="todo">
                <input type="submit" name="card" value="+">
            </form> --}}
        </div>
    </div>

@endforeach

@endsection


