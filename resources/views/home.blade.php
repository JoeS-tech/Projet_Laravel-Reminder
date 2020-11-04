@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ @route('user.profile') }}">Modifier le profil</a>
            <a href="{{ @route('user.postit') }}">Accéder à vos Post-it</a>
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <div class="card-body">
                    <span>Nom: {{Auth::user()->name}}</span>
                    <br>
                    <span>Prénom: {{Auth::user()->firstname}}</span>
                    <br>
                    <span>Email: {{Auth::user()->email}}</span>
                </div>
                <button onclick="window.location.href='{{@route('user.profile')}}'">Modifiez votre Profile</button>
            </div>
        </div>
    </div>
</div>
@endsection
