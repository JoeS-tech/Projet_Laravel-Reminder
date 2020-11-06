<style>
    .tableau{
        border: 2px black solid;
    }
</style>

@extends('layouts.postit_template')

@section('postit')

@foreach($columns as $column)
<div class="tableau">{{ $column->id }}</div>
@endforeach

@endsection
Pas hellow :


