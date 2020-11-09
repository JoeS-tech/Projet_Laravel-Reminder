@extends('layouts.app')
@section('content')

  Hellow Darkness my old friend :
<form method="POST" action="{{ @route('user.sendTable') }}">
    @csrf
    <input type="text" name="title" value="Nouvelle Table">
    <input type="submit" value="Envoyer">
</form>

<table>
    @foreach ($tables as $table)
        <div>
        <a href="{{ @route('user.postit',[$table->id]) }}">{{ $table->title }}<br></a>
        {{ $table->id }}

        <form method="POST" action="{{ @route('ediTable') }}">
            @csrf

            <input type="text" name="title" value="Changer le Titre">
            <input type="hidden" name="test" value='{{$table->id}}'>
            <input type="submit" value='modifier'>

        </form>

        </div>
    @endforeach
</table>

@endsection
