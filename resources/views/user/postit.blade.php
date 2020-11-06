<style>
    .tableau{
        border: 2px black solid;
        width: 25%;
        height: 250px;
        background-color:red;
    }
</style>

@extends('layouts.postit_template')
@section('postit')
<form method="POST" action="{{ @route('user.addCol') }}">
    @csrf
    <input type="textarea" name="title">
    <input type="submit" value="Ajouter">
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
            <form method="POST">
            <input type="text" name="cards">
            <form>
        </div>
    </div>

@endforeach

@endsection


