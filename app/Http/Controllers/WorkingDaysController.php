<?php

namespace App\Http\Controllers;

use App\Models\WorkingDays;
use Illuminate\Http\Request;

class WorkingDaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hours = WorkingDays::first()->get()[0];
        return view("dashboard.working",["hours" => $hours]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sat_open = $request->sat_open;
        $sat_close = $request->sat_close;
        $sun_open = $request->sun_open;
        $sun_close = $request->sun_close;
        $mon_open = $request->mon_open;
        $mon_close = $request->mon_close;
        $tue_open = $request->tue_open;
        $tue_close = $request->tue_close;
        $wed_open = $request->wed_open;
        $wed_close = $request->wed_close;
        $thu_open = $request->thu_open;
        $thu_close = $request->thu_close;
        $fri_open = $request->fri_open;
        $fri_close = $request->fri_close;
        $day = new WorkingDays();
        $day->sat_open = $sat_open;
        $day->sat_close = $sat_close;
        $day->sun_open = $sun_open;
        $day->sun_close = $sun_close;
        $day->mon_open = $mon_open;
        $day->mon_close = $mon_close;
        $day->tue_open = $tue_open;
        $day->tue_close = $tue_close;
        $day->wed_open = $wed_open;
        $day->wed_close = $wed_close;
        $day->thu_open = $thu_open;
        $day->thu_close = $thu_close;
        $day->fri_open = $fri_open;
        $day->fri_close = $fri_close;
        WorkingDays::query()->delete();
        $day->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
