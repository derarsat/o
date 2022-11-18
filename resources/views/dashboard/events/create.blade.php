@extends("dashboard.layout")
@section("title")
Create Event
@endsection
@section("content")
<h2 class="page-title">
    Create Event
</h2>
<form action="{{route('events.store')}}" method="post" class="grid grid-cols-2 gap-12" enctype="multipart/form-data">
    @csrf
    <div>
        {{--Title--}}
        <div class="input-group">
            <label for="title"> Title</label>
            <input type="text" id="title" placeholder="Enter event name" required name="title">
            @error('title')
            <span class="error-label" role="alert">
                <strong>{{ $message }}
            </span>
            @enderror
        </div>
        {{--Price--}}
        <div class="input-group">
            <label for="price"> Price (AED)</label>
            <input type="number" id="price" placeholder="Enter event price" required name="price">
            @error('price')
            <span class="error-label" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        {{--Description--}}
        <div class="input-group">
            <label for="desc"> Description</label>
            <textarea id="desc" placeholder="Enter event description" required name="desc"> </textarea>
            @error('desc')
            <span class="error-label" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="flex w-full input-group flex-col">
            <label>Cover image</label>
            <label for="image" class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-primary border-dashed cursor-pointer ">
                <div class="flex flex-col justify-center items-center pt-5 pb-6">
                    <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span>
                        or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG, JPEG (460px580px)</p>
                </div>
                <input id="image" name="image" type="file" class="hidden" accept="image/png, image/jpg, image/svg, image/jpeg" />
            </label>
            @error('image')
            <span class="error-label" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    {{--COl 2--}}
    <div>
        {{--Duration--}}
        <div class="input-group">
            <label for="duration">Duration (Minutes)</label>
            <input type="number" id="duration" placeholder="Enter event duration" required name="duration">
            @error('duration')
            <span class="error-label" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        {{--Hint--}}
        <div class="input-group">
            <label for="hint"> Hint</label>
            <textarea id="hint" placeholder="Enter event hint" required name="hint"> </textarea>
            @error('hint')
            <span class="error-label" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        {{--Date--}}
        <div class="input-group">
            <label for="date">Date</label>
            <input type="datetime-local" id="date" placeholder="Enter event date" required name="date">
            @error('date')
            <span class="error-label" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <input type="submit" value="Save" class="bg-primary text-white -mt-12 mb-4">

</form>
@endsection