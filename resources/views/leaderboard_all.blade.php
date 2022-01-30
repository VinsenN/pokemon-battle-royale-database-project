@extends('layout')

@section('content')

<div class="container col-8 my-4">
    <div>
        <a href="/leaderboard" type="button" class="btn btn-outline-primary" style="padding-top: 3px; padding-bottom: 3px; padding-left: 10px; padding-right: 10px;">
            <i class="icon-arrow-left d-inline-block"style="font-size: 11px" ></i>
            <cst-ft style="font-size: 14px" >Back</cst-ft>
        </a>
    </div>
    <br>

    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Trainer</th>
                <th scope="col">Total Play</th>
                <th scope="col">Total Score</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 0; @endphp
            @foreach($statistics as $statistic)
                <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{$statistic -> name}}</td>
                    <td>{{$statistic -> cm}}</td>
                    <td>
                    @if($statistic -> cm === 0)
                        0
                    @else
                        {{$statistic -> ms}}
                    @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

