@extends("dashboard.layout")
@section("title")
Working Days
@endsection
@section("content")
<form action="{{route('working-days.store')}}" method="post">
    @csrf
    <h2 class="page-title">
        Manage Opening Hours
        <button class="bg-primary text-white text-base px-4 py-2 rounded-md ">Save</button>
    </h2>

    <div class="grid grid-cols-5 gap-4">
        <div class="flex flex-col gap-3 items-start justify-center bg-gray-200 p-4 rounded-md">
            Saturday
            <input type="time" value="{{$hours->sat_open}}" name="sat_open" required>
            <input type="time" value="{{$hours->sat_close}}" name="sat_close" required>
        </div>
        <div class="flex flex-col gap-3 items-start justify-center bg-gray-200 p-4 rounded-md">
            Sunday
            <input type="time" value="{{$hours->sun_open}}" name="sun_open" required>
            <input type="time" value="{{$hours->sun_close}}" name="sun_close" required>
        </div>
        <div class="flex flex-col gap-3 items-start justify-center bg-gray-200 p-4 rounded-md">
            Monday
            <input type="time" value="{{$hours->mon_open}}" name="mon_open" required>
            <input type="time" value="{{$hours->mon_close}}" name="mon_close" required>
        </div>

        <div class="flex flex-col gap-3 items-start justify-center bg-gray-200 p-4 rounded-md">
            Tuesday
            <input type="time" value="{{$hours->tue_open}}" name="tue_open" required>
            <input type="time" value="{{$hours->tue_close}}" name="tue_close" required>
        </div>
        <div class="flex flex-col gap-3 items-start justify-center bg-gray-200 p-4 rounded-md">
            Wednesday
            <input type="time" value="{{$hours->wed_open}}" name="wed_open" required>
            <input type="time" value="{{$hours->wed_close}}" name="wed_close" required>
        </div>
        <div class="flex flex-col gap-3 items-start justify-center bg-gray-200 p-4 rounded-md">
            Thursday
            <input type="time" value="{{$hours->thu_open}}" name="thu_open" required>
            <input type="time" value="{{$hours->thu_close}}" name="thu_close" required>
        </div>
        <div class="flex flex-col gap-3 items-start justify-center bg-gray-200 p-4 rounded-md">
            Friday
            <input type="time" value="{{$hours->fri_open}}" name="fri_open" required>
            <input type="time" value="{{$hours->fri_close}}" name="fri_close" required>
        </div>
    </div>
</form>

@endsection