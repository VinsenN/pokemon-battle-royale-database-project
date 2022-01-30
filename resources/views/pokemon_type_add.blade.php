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
    <form action="/pokemon/add_pokemon_type/process" method="post">
        {{ csrf_field() }}
        <div class="form-row align-items-center">
            <div class="col-auto">
                <label class="sr-only" for="inlineFormInputGroup">Pokemon Type</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Pokemon Type</div>
                    </div>
                    <input name="name" type="text" class="form-control" autocomplete="off" id="inlineFormInputGroup" placeholder="">
                </div>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Insert</button>
            </div>

        </div>
        <div> <b>
            @if ($errors -> any())
                <div class="text-danger">
                    @foreach ($errors -> all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div> <br>
            @else
                <div class="text-success">
                    {{ session('status') }}
                </div>
            @endif
        </b> </div>
    </form>


    <ul class="list-group">
        @foreach($pokemon_types as $pokemon_type)
            <a href = "/pokemon/add_pokemon_type/{{ $pokemon_type -> id }}" style="text-decoration:none; color: black;">
                <li class="list-group-item"> {{ $pokemon_type -> name }} </li>
            </a>
        @endforeach
    </ul>
</div>

@endsection

