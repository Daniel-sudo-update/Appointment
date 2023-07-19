@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="center">
        Business Hours
    </h1>

    <div class="row center">

        <form action="{{route('business_hours.update')}}" method="post">
            @csrf
            @foreach($businessHours as $businessHour)
            <div class="col s3">
                <h4><hr>
                    {{$businessHour->day}}
                </h4>
            </div>
            <input type="hidden" name="data[{{$businessHour->day}}][day]" value="{{$businessHour->day}}">
            <div class="input-field col s3">
                <input type="text" class="timepicker" value="{{$businessHour->from_1}}" name="data[{{$businessHour->day}}][from_1]" placeholder="From">
                <input type="text" class="timepicker" value="{{$businessHour->to_1}}" name="data[{{$businessHour->day}}][to_1]" placeholder="To">
                <input type="text" class="timepicker" value="{{$businessHour->from_2}}" name="data[{{$businessHour->day}}][from_2]" placeholder="From">
                <input type="text" class="timepicker" value="{{$businessHour->to_2}}" name="data[{{$businessHour->day}}][to_2]" placeholder="To">
            </div>

            <div class="input-field col s2">
                <input type="number" name="data[{{$businessHour->day}}][step]" value="{{$businessHour->step}}" placeholder="Step">
            </div>

            <div class="input-field col s3">
                <p>
                    <label>
                        <input value="true" name="data[{{$businessHour->day}}][off]" class="filled-in" type="checkbox" @checked($businessHour->off) />
                        <span>OFF</span>
                    </label>
                </p>
            </div>
            @endforeach
            <div class="col s12">
                <button class="waves-effect waves-light btn info darken-2" type="submit">
                    save
                </button>
            </div>
        </form>
    </div>
</div>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.timepicker');
        var instances = M.Timepicker.init(elems, {
            twelveHour:false
        });
    });
</script> --}}
@endsection
