@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-left">
      Available Appointments:
    </h1>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    @foreach($appointments as $appointment)
                        <th class="text-center">{{$appointment['day_name']}}</th>
                    @endforeach
                </tr>
                <tr>
                    @foreach($appointments as $appointment)
                        <th class="text-center">{{$appointment['date']}}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($appointments as $appointment)
                        <td>
                            @if(!$appointment['off'])
                                @foreach($appointment['available_hours'] as $time)
                                    <form action="{{route('reserve')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="date" value="{{$appointment['full_date']}}">
                                        <input type="hidden" name="time" value="{{$time}}">
                                        <button class="btn btn-info btn-block" type="submit">
                                            {{$time}}
                                        </button>
                                    </form>
                                @endforeach
                            @else
                                <div class="text-center text-muted">Closed</div>
                            @endif
                        </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.timepicker');
        var instances = M.Timepicker.init(elems, {
            twelveHour:false
        });
    });
</script>
@endsection
