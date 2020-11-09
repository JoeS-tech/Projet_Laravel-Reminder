<style>
    body {
        background-image: url("{{ backgroundForPage('user.dashboard', 'storage/assets/uploads/robibi.jpg') }}");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
    .lsh_delicon{
        width:30px;
        border-radius: 50%;
    }
    .lsh_editicon{
        width:30px;
        height:30px;
        border-radius: 50%;
    }
    .lsh_flexRight{
        float:left;
    }
    .lsh_center{
        justify-content: center;
    }

    .lsh_card{
        margin:35px;
    }
    /* .lsh_deliconModal{
        width:25%;
        border-radius: 50%;
    } */
</style>
@extends('layouts.app')

@section('content')

    <div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Ajouter une Nouvelle Table:</h5>
                <form method="POST" action="{{ @route('user.sendTable') }}">
                    @csrf
                    <input type="text" name="title" value="Nouvelle Table">
                    <input type="submit" value="Envoyer">
                </form>
            </div>
        <div>
    </div>
    </div>

    @foreach ($tables as $table)
            <div>
                <div class="card lsh_card" style="width: 18rem;">
                    <div class="card-body">

                        <div class="row lsh_center">
                            <div class="col"></div>
                                <div class="col">
                                    <h3 class="card-title">
                                        <a href="{{ @route('user.postit',[$table->id]) }}">{{ $table->title }}</a>
                                    </h3>
                                <!-- Small modal for EDIT -->
                                </div>
                                <div class="col">
                                    <input type="image" class="lsh_editicon" data-toggle="modal"
                                            src="../storage/assets/uploads/edit.png" alt="iconDel"
                                            data-target={{ '.modalComment'.$table->id }}>

                                        <div class="modal fade {{ 'modalComment'.$table->id }} " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <form method="POST" action="{{ @route('ediTable',[$table->id]) }}">
                                                        @csrf
                                                        <input type="text" name="title" value="Changer le Titre">
                                                        <input type="hidden" name="test" value='{{$table->id}}'>
                                                        <input type="submit" value='modifier'>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row lsh_flexRight">
                                    <form method="POST" action="{{ @route('delTable',[$table->id]) }}">

                                        @csrf
                                        <input class="lsh_delicon" type="image" name="delTab"
                                        src="../storage/assets/uploads/del.png" alt="iconDel">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    @endforeach

@endsection
