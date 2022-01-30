@extends('layout')

@section('content')

<div class="container col-8 my-4">
    <table class="table">
        <b class="d-flex justify-content-center unselectable" style="font-size: 20px;"> Outstanding Trainers Among All</b>
        <hr>
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
    <hr>
    <div>
        <a href = "/leaderboard/all" type="button" class="btn btn-secondary btn-lg btn-block stretched-link" style="position: relative;"> View All Trainers Stats </a>
    </div>
</div>

@endsection

