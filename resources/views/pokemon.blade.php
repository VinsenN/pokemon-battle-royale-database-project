@extends('layout')

@section('content')

<div class="container col-8 my-4">
    <a type="button" href="/pokemon/add_pokemon" class="btn btn-primary btn-lg btn-block" style="font-size:16px">Add New Pokemon</a>
    <a type="button" href="/pokemon/add_pokemon_type" class="btn btn-secondary btn-lg btn-block" style="font-size:16px">Add New Pokemon Type</a>
    <br><hr><br>
    <div class="row mb-4">
        @foreach($pokemon as $pokemon)
            <div class="col-sm-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title fw-bold" style="font-size:14px; font-weight: bold;">
                            {{ $pokemon -> name }}
                        </div>
                        <div class="card-subtitle mb-2 text-muted" style="font-size:14px;">
                            <b>Types</b>:
                            @foreach ( $pokemon -> pokemon_types as $pokemon_type)
                                {{ $pokemon_type -> name }}
                                @if(!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </div>
                        <hr>
                        <div class="card-text" style="font-size:14px; tab-size: 6">
                            <b>Health</b>   : {{ $pokemon -> health }} <br>
                            <b>Attack</b>   : {{ $pokemon -> attack }} <br>
                            <b>Speed</b>    : {{ $pokemon -> speed }} <br>
                            <b>Defense</b>  : {{ $pokemon -> defense }} <br>
                        </div>
                        <a href="/pokemon/view_pokemon/{{$pokemon -> id}}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection

