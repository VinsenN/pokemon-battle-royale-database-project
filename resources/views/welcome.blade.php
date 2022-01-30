@extends('layout')

@section('content')

<div class="container mt-4 text-center card rounded border-2 border-warning">
    <div class="mt-3 d-flex justify-content-center" style="font-size: 20px;">
        <b>Pokemon Battle Royale Simulator</b>
    </div>
    <form method="post">
        {{ csrf_field() }}

        <div class="row my-3 mb-5 align-items-center">
            <div class="container col-5 ">
                <label for="" class="col-form-label"><b>Player 1</b></label>
                <select name="players[]" class="form-select" aria-label="Default select example">
                    <option disabled selected>Choose Player</option>
                    @foreach($players as $player)
                        <option value="{{$player -> id}}">{{$player -> name}}</option>
                    @endforeach
                </select>
                <br>
                <select name="pokemon[]" class="form-select" aria-label="Default select example">
                    <option disabled selected>Choose Pokemon</option>
                    @foreach($pokemons as $pokemon)
                        <option value="{{$pokemon -> id}}">{{$pokemon -> name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="container col-2">
                <b> VS </b>
            </div>

            <div class="container col-5">
                <label for="" class="col-form-label"><b>Player 2</b></label>
                <select name="players[]" class="form-select" aria-label="Default select example">
                    <option disabled selected>Choose Player</option>
                    @foreach($players as $player)
                        <option value="{{$player -> id}}">{{$player -> name}}</option>
                    @endforeach
                </select>
                <br>
                <select name="pokemon[]" class="form-select" aria-label="Default select example">
                    <option disabled selected>Choose Pokemon</option>
                    @foreach($pokemons as $pokemon)
                        <option value="{{$pokemon -> id}}">{{$pokemon -> name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="my-3 mb-3 d-flex justify-content-center">
            <div>
                <input type="submit" class="btn btn-lg btn-block btn-danger float-end" formaction="/match/process_battle" value="BATTLE">
            </div>
        </div>
        <br>
        <div class="d-flex justify-content-center">
            <div>
                <input type="submit" class="btn btn-lg btn-block btn-warning border-2 float-end" formaction="/match/reset_simulation" value="RESET SIMULATION">
            </div>
        </div>
        <br>
        <div style="!important; text-align:left !important"> <b>
            @if ($errors -> any())
            <div class="text-danger">
                Please make sure player 1 and 2 are different and all boxes selected !!
            </div>
            @else
            <div class="text-success">
                {{ session('status') }}
            </div>
            @endif
        </b> </div> <br>
    </form>
</div>

<div class="container col-10 my-4" style="font-size: 14px;">
    <div class="list-group">
        @foreach($matchs as $match)
        <a href="" class="list-group-item list-group-item-action border-2 flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <p class="mb-1" style="font-weight: bold">Match {{$match -> id}}</p>
                <small>{{$match -> schedule}} GMT +8</small>
            </div>
            @foreach($match -> players as $player)
                <p class="mb-1"><b>{{$player -> name}}</b></p>

                <p class="mb-1">Score: {{$player -> pivot -> match_score}}</p>
                <p class="mb-1">Pokemon:
                @foreach($player -> pokemon as $pokemon)
                    @if($player -> pivot -> pokemon_id == $pokemon -> id)
                        {{$pokemon -> name}}
                        @break
                    @endif
                @endforeach
                </p>

                @if(!$loop->last)
                    <br>
                @endif
            @endforeach
        </a>
        @endforeach
    </div>
</div>


@endsection
