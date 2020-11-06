@extends('layouts.postit_template')

@section('postit')

@foreach($columns as $column)
{{ $column->id }}
@endforeach

@endsection
Pas hellow :
