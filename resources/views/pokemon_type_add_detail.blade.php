@extends('layout')

@section('content')

<div class="container col-8 my-4">
    <div>
        <a href="/pokemon/add_pokemon_type" type="button" class="btn btn-outline-primary" style="padding-top: 3px; padding-bottom: 3px; padding-left: 10px; padding-right: 10px;">
            <i class="icon-arrow-left d-inline-block"style="font-size: 11px" ></i>
            <cst-ft style="font-size: 14px" >Back</cst-ft>
        </a>
    </div>
    <br>

    <form method="post">
        {{ csrf_field() }}
        <label for="basic-url">Pokemon type name</label>

        <input name="name" type="text" class="form-control mb-2" autocomplete="off" placeholder="Insert Name" value="{{ $pokemon_types -> name }}">
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
            <input type="submit" class="btn-lg btn-sm btn-primary ms-4 float-end" formaction="/pokemon/add_pokemon_type/{{$pokemon_types -> id}}/update" value="Update">
            <input type="submit" class="btn-lg btn-sm btn-danger ms-4 float-end" formaction="/pokemon/add_pokemon_type/{{$pokemon_types -> id}}/delete" value="Delete">
        </div>
    </form>
</div>

@endsection
