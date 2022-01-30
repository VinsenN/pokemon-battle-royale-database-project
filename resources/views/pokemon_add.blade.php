@extends('layout')

@section('content')

<div class="container col-8 my-4">
    <div>
        <a href="/pokemon" type="button" class="btn btn-outline-primary" style="padding-top: 3px; padding-bottom: 3px; padding-left: 10px; padding-right: 10px;">
            <i class="icon-arrow-left d-inline-block"style="font-size: 11px" ></i>
            <cst-ft style="font-size: 14px" >Back</cst-ft>
        </a>
    </div>
    <br>

    <div style="font-size: 20px;">
        <b> Add New Pokemon </b>
    </div> <br>

    <form method="post">
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input name="name" class="form-control" autocomplete="off" placeholder="">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Health</label>
            <div class="col-sm-10">
                <input name="health" class="form-control" autocomplete="off" placeholder="">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Attack</label>
            <div class="col-sm-10">
                <input name="attack" class="form-control" autocomplete="off" placeholder="">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Speed</label>
            <div class="col-sm-10">
                <input name="speed" class="form-control" autocomplete="off" placeholder="">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Defense</label>
            <div class="col-sm-10">
                <input name="defense" class="form-control" autocomplete="off" placeholder="">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Pokemon Type</label>
            <div class="col-sm-10">
                @foreach($pokemon_types as $pokemon_type)
                    <div class="form-check">
                        <input name = "pokemon_type_name[]" class="form-check-input" type="checkbox" value="{{$pokemon_type -> id}}" id="{{$pokemon_type -> id}}">
                        <label class="form-check-label" for="{{$pokemon_type -> id}}">
                            {{ $pokemon_type -> name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <div> <b>
                @if ($errors -> any())
                <div class="text-danger">
                    @foreach ($errors -> all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
                @else
                <div class="text-success">
                    {{ session('status') }}
                </div>
                @endif
            </b> </div>
            <div>
                <input type="submit" class="btn-lg btn-sm btn-primary ms-4 float-end" formaction="/pokemon/add_pokemon/process" value="Insert">
            </div>
        </div>

    </form>
</div>

@endsection

