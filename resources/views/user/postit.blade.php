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
@foreach($columns as $column)

    <div class="tableau">
        <div>
            {{ $column->title }}
        </div>
        <div>
            {{ $column->id}}
        </div>
    </div>

@endforeach

@endsection


