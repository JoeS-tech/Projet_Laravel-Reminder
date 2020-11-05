@extends('layouts.app')
@section('content')

  Hellow Darkness my old friend :
<form method="POST" action="{{ @route('user.sendTable') }}">
    @csrf
    <input type="number" name="user_id">
    <input type="submit" value="Envoyer">
</form>

@foreach ($tables as $table)
    <li>{{ $table->user_id }}</li>
@endforeach


@endsection
