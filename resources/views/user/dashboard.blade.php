@extends('layouts.app')
@section('content')
<div>
    <h3>Ajouter une Nouvelle Table:</h3>
    <form method="POST" action="{{ @route('user.sendTable') }}">
        @csrf
        <input type="text" name="title" value="Nouvelle Table">
        <input type="submit" value="Envoyer">
    </form>
</div>
<div>
    <br>
    @foreach ($tables as $table)
        <div>
        <a href="{{ @route('user.postit',[$table->id]) }}">{{ $table->title }}<br></a>
        {{ $table->id }}

        <form method="POST" action="{{ @route('ediTable',[$table->id]) }}">
            @csrf

            <input type="text" name="title" value="Changer le Titre">
            <input type="hidden" name="test" value='{{$table->id}}'>
            <input type="submit" value='modifier'>

        </form>
        <form method="POST" action="{{ @route('delTable',[$table->id]) }}">
            @csrf
            <input type="submit" value='Supprimer'>

        </form>

        </div>
    @endforeach
    </div>

@endsection
