<?php

namespace Modules\BusManagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\BusManagement\Entities\BusSeat;
use Modules\BusManagement\Http\Requests\BusSeatRequest;
use Modules\BusManagement\Transformers\BusSeatResource;
use Modules\RouteManagement\Entities\BusRoute;
use Modules\RouteManagement\Transformers\RouteBusMappingResource;

class BusSeatManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $records = BusSeat::all();
        $filtered_records = BusSeatResource::collection($records);
        return response($filtered_records, 200);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('busmanagement::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(BusSeatRequest $request)
    {
        $record = $request->all();
        $seat =  BusSeat::create($record);
        return response($seat, 200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $record = BusSeat::findOrFail($id);
        return response($record, 200);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('busmanagement::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(BusSeatRequest $request, $id)
    {
        $record = BusSeat::findOrFail($id);
        $input = $request->all();
        $seat = $record->fill($input)->save();
        return response($seat, 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $record = BusSeat::findOrFail($id);
        $record = $record->delete();
        return response($record, 200);
    }
}
