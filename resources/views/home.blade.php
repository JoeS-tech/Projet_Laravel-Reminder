@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ @route('user.profile') }}">Modifier le profil</a>
<<<<<<< HEAD

=======
>>>>>>> b9fab71a584da914fd9143e9ab106a46a8336519
            <div class="card">
                <div class="card-header">Dashboard</div>
                <a href="{{ @route('user.dashboard') }}">Dash</a>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <h2> Vous êtes connecté en tant que {{ Auth::user()->name }} ! </h2>
                </div>
                <div class="card-body">
                    <span>Nom: {{Auth::user()->name}}</span>
                    <br>
                    @if(Auth::user()->firstname === NULL)
                    @else
                    Prénom: {{Auth::user()->firstname}}
                    <br>
                    @endif
                    <span>Email: {{Auth::user()->email}}</span>
                </div>
                <button onclick="window.location.href='{{@route('user.profile')}}'">Modifiez votre Profil</button>
            </div>
        </div>
    </div>
</div>
@endsection
