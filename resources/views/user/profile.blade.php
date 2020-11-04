@extends('layouts.app')
@section('content')

<form method="POST" action="{{ @route('user.sendProfile') }}">
    @if($errors->any()) {{-- si il y a une erreur...--}}
        @foreach($errors->all() as $e) {{-- --}}
            <h3 class="red-text">{{ $e }}</h3>
        @endforeach
    @endif
    @csrf
    <label for="name">Entrez un nouveau pseudo: </label>
    <input type="text" name="name" id="name">
    <br>
    <label for="email">Entrez votre email: </label>
    <input type="text" name="email" id="email">
    <br>
    <label for="firstname">Entrez votre prénom: </label>
    <input type="text" name="firstname" id="firstname">
    <br>
    <label for="lastname">Entrez votre nom: </label>
    <input type="text" name="lastname" id="lastname">
    <br>
    <label for="password">Entrez un nouveau mot de passe: </label>
    <input type="password" name="password" id="password">
    <br>
    <input type="submit" value="Valider">

</form>
@endsection
