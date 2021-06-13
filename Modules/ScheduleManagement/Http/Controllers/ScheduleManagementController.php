<?php

namespace Modules\ScheduleManagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Routing\Controller;
use Modules\ScheduleManagement\Entities\BusSchedule;
use Modules\ScheduleManagement\Http\Requests\ScheduleManagementRequest;
use Modules\ScheduleManagement\Transformers\ScheduleManagementResource;
use Modules\ScheduleManagement\Transformers\ScheduleResourceCollection;

class ScheduleManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        //
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
    public function store(ScheduleManagementRequest $request)
    {
        $record = $request->all();
        $schedule =  BusSchedule::create($record);
        return response($schedule, 200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $record = BusSchedule::findOrFail($id);
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
    public function update(ScheduleManagementRequest $request, $id)
    {
        $record = BusSchedule::findOrFail($id);
        $input = $request->all();
        $busSchedule = $record->fill($input)->save();
        return response($busSchedule, 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $record = BusSchedule::findOrFail($id);
        $record = $record->delete();
        return response($record, 200);
    }

    public function getScheduleList() {
        $records = BusSchedule::all();
        $filtered_records = new ScheduleResourceCollection($records);
        return response($filtered_records, 200);
    }
}
