<?php

namespace Modules\BusManagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\BusManagement\Entities\Bus;
use Modules\BusManagement\Http\Requests\BusManagementRequest;
use Modules\BusManagement\Transformers\BusManagementResource;

class BusManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $records = Bus::all();
        $filtered_records = BusManagementResource::collection($records);
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
     * @param BusManagementRequest $request
     * @return Renderable
     */
    public function store(BusManagementRequest $request)
    {
        $record = $request->all();
        $bus = Bus::create($record);
        return response($bus, 200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $record = Bus::findOrFail($id);
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
    public function update(BusManagementRequest $request, $id)
    {
        $record = Bus::findOrFail($id);
        $input = $request->all();
        $bus = $record->fill($input)->save();
        return response($bus, 200);

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $record = Bus::findOrFail($id);
        $record = $record->delete();
        return response($record, 200);
    }
}
