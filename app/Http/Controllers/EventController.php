<?php

namespace App\Http\Controllers;

use App\Helper\File;
use App\Models\Event;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class EventController extends Controller
{
    use File;

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $events = Event::all();
        return view("dashboard.events.all", ["events" => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("dashboard.events.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:events|max:255',
            'desc' => 'required',
            'hint' => 'required',
            'duration' => 'required',
            'price' => 'required',
            'date' => 'required|date',
            'image' => 'required|mimes:jpeg,png,jpg,svg',
        ]);
        $event = new Event();
        $event->title = $validated["title"];
        $event->desc = $validated["desc"];
        $event->hint = $validated["hint"];
        $event->duration = $validated["duration"];
        $event->date = $validated["date"];
        $event->price = $validated["price"];
        // Image
        $imageFile = $request->file('image');
        $imagePath = 'events/';
        $imageUrl = $this->imageFile($imageFile, $imagePath, 460, 580);
        $event->image = $imageUrl;
        $event->save();
        return redirect(route("events.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $event = Event::where("id", "=", $id)->get()[0];
        return view("dashboard.events.edit", ["event" => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255|unique:events,name,' . $id . ',id',
            'desc' => 'required',
            'hint' => 'required',
            'duration' => 'required|integer',
            'price' => 'required|integer',
            'date' => 'required|date',
            'image' => 'required|mimes:jpeg,png,jpg,svg',
        ]);
        $event = Event::find($id);
        $event->title = $validated["title"];
        $event->desc = $validated["desc"];
        $event->hint = $validated["hint"];
        $event->duration = $validated["duration"];
        $event->date = $validated["date"];
        $event->price = $validated["price"];
        // Image
        if ($request->file('image')) {
            $imageFile = $request->file('image');
            $imagePath = 'events/';
            $imageUrl = $this->imageFile($imageFile, $imagePath, 460, 580);
            $event->image = $imageUrl;
        }
        $event->save();
        return redirect(route("events.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect(route("events.index"));
    }
}
