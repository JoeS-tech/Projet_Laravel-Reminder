@extends('layouts.app')
@section('content')

  Hellow Darkness my old friend :
<form method="POST" action="{{ @route('user.sendTable') }}">
    @csrf
    <input type="number" name="user_id">
    <input type="submit" value="Envoyer">
</form>

<table>
    @foreach ($tables as $table)
        <div>
        <a href="{{ @route('user.postit',[$table->id]) }}">{{ $table->user_id }}<br></a>
            {{ $table->id }}
        </div>
        <tr>
            <ul></ul>
        </tr>
        <tr>
            <td>
                <ul></ul>
            </td>
        </tr>
    @endforeach
</table>

@endsection
