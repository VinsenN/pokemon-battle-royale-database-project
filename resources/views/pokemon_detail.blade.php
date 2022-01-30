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

    <form method="post">
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input name="name" class="form-control" autocomplete="off" placeholder="" value ="{{$pokemon -> name}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Health</label>
            <div class="col-sm-10">
                <input name="health" class="form-control" autocomplete="off" placeholder="" value ="{{$pokemon -> health}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Attack</label>
            <div class="col-sm-10">
                <input name="attack" class="form-control" autocomplete="off" placeholder="" value ="{{$pokemon -> attack}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Speed</label>
            <div class="col-sm-10">
                <input name="speed" class="form-control" autocomplete="off" placeholder="" value ="{{$pokemon -> speed}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Defense</label>
            <div class="col-sm-10">
                <input name="defense" class="form-control" autocomplete="off" placeholder="" value ="{{$pokemon -> defense}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Pokemon Type</label>
            <div class="col-sm-10">
                @foreach($pokemon_types as $pokemon_type)
                    <div class="form-check">
                        <input
                        @foreach ($pokemon -> pokemon_types as $specific_type)
                            @if($specific_type -> id == $pokemon_type -> id)
                                checked
                            @endif
                        @endforeach

                        name = "pokemon_type_name[]" class="form-check-input" type="checkbox" value="{{$pokemon_type -> id}}" id="{{$pokemon_type -> id}}">
                        <label class="form-check-label" for="{{$pokemon_type -> id}}">
                            {{ $pokemon_type -> name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

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

        <br>
        <div>
            <input type="submit" class="btn-lg btn-sm btn-primary ms-4 float-end" formaction="/pokemon/view_pokemon/{{ $pokemon -> id}}/update" value="Update">
            <input type="submit" class="btn-lg btn-sm btn-danger ms-4 float-end" formaction="/pokemon/view_pokemon/{{ $pokemon -> id}}/delete" value="Delete">
        </div>
    </form>
</div>

@endsection

