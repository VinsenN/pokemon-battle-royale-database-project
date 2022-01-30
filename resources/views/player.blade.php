@extends('layout')

@section('content')

<div class="container col-8 my-4">
    <form action="/player/add" method="post">
    	{{ csrf_field() }}
        <div class="form-row align-items-center">
            <div class="col-auto">
                <label class="sr-only" for="inlineFormInputGroup">Player</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Player</div>
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
        @foreach($players as $player)
            <a href = "/player/{{ $player -> id }}" style="text-decoration:none; color: black;">
            	<li class="list-group-item"> {{ $player -> name }} </li>
            </a>
        @endforeach
    </ul>
</div>

@endsection

