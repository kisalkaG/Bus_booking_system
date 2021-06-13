<?php

namespace Modules\ScheduleManagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ScheduleManagement\Entities\BusSchedule;
use Modules\ScheduleManagement\Entities\BusScheduleBooking;
use Modules\ScheduleManagement\Http\Requests\ScheduleBookingRequest;
use Modules\ScheduleManagement\Transformers\ScheduleBookingResourceCollection;

class ScheduleBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $records = BusScheduleBooking::all();
        $filtered_records = new ScheduleBookingResourceCollection($records);
        return response($filtered_records, 200);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('schedulemanagement::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ScheduleBookingRequest $request)
    {
//        dd(1);
        $record = $request->all();
        $schedule =  BusScheduleBooking::create($record);
        return response($schedule, 200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $record = BusScheduleBooking::findOrFail($id);
        return response($record, 200);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('schedulemanagement::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ScheduleBookingRequest $request, $id)
    {
        $record = BusScheduleBooking::findOrFail($id);
        $input = $request->all();
        $busScheduleBooking = $record->fill($input)->save();
        return response($busScheduleBooking, 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $record = BusScheduleBooking::findOrFail($id);
        $record = $record->delete();
        return response($record, 200);
    }

    /**
     *
     */
    public function getAllBookingsById($id){
        dd($id);
    }

    public function cancelBooking(){

    }
}
