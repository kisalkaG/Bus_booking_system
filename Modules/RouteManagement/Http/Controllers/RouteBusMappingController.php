<?php

namespace Modules\RouteManagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\RouteManagement\Entities\BusRoute;
use Modules\RouteManagement\Entities\Route;
use Modules\RouteManagement\Http\Requests\RouteBusMappingRequest;
use Modules\RouteManagement\Http\Requests\RouteManagementRequest;
use Modules\RouteManagement\Transformers\RouteBusMappingResource;
use Modules\RouteManagement\Transformers\RouteManagementResource;

class RouteBusMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $records = BusRoute::all();
        $filtered_records = RouteBusMappingResource::collection($records);
        return response($filtered_records, 200);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('routemanagement::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(RouteBusMappingRequest $request)
    {
        $record = $request->all();
        $route =  BusRoute::create($record);
        return response($route, 200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $record = BusRoute::findOrFail($id);
        return response($record, 200);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('routemanagement::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(RouteBusMappingRequest $request, $id)
    {
        $record = BusRoute::findOrFail($id);
        $input = $request->all();
        $route = $record->fill($input)->save();
        return response($route, 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $record = BusRoute::findOrFail($id);
        $record = $record->delete();
        return response($record, 200);
    }
}
