@extends('layouts.app')
@section('content')

<div class="card-body">

    @if(Auth::user()->lastname ==NULL && Auth::user()->firstname ==NULL)
        Saisissez votre nom et prénom
        <br>
        @else
        <span>Prénom: {{Auth::user()->firstname}} </span>
        <br>
        <span>Nom: {{Auth::user()->lastname}} </span>
        <br>
    @endif

    <span>Username: {{Auth::user()->name}}</span>
    <br>
    <span>Email: {{Auth::user()->email}}</span>

{{-- @if("isset" ) --}}
    <input type="button" name="cmd" value="Modifiez votre Profil">
</div>

<form method="POST" action="{{ @route('user.sendProfile') }}" enctype="multipart/form-data">
    @if($errors->any()) {{-- si il y a une erreur...--}}
        @foreach($errors->all() as $e) {{-- --}}
            <h3 class="red-text">{{ $e }}</h3>
        @endforeach
    @endif
    @csrf
    <label for="file">Séléctionnez votre avatar! </label>
    <input type="file" name="avatar" id="file">
    <br>
    <label for="name">Entrez un nouveau pseudo: </label>
    <input type="text" name="name" id="name" value="{{Auth::user()->name}}">
    <br>
    <label for="email">Entrez votre email: </label>
    <input type="text" name="email" id="email" value="{{Auth::user()->email}}">
    <br>
    <label for="firstname">Entrez votre prénom: </label>
    <input type="text" name="firstname" id="firstname" placeholder="prénom">
    <br>
    <label for="lastname">Entrez votre nom: </label>
    <input type="text" name="lastname" id="lastname" placeholder="nom">
    <br>
    <label for="password">Entrez un nouveau mot de passe: </label>
    <input type="password" name="password" id="password" placeholder="mot de passe">
    <br>
    <input type="submit" value="Valider">

</form>
@endsection
