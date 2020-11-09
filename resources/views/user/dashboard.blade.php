<style>
    body {
        background-image: url("{{ backgroundForPage('user.dashboard', 'storage/assets/uploads/login-page.jpg') }}");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
</style>
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

        </div>
    @endforeach
    </div>

@endsection
