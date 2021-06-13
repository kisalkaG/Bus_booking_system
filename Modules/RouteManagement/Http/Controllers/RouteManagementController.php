<?php

namespace Modules\RouteManagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\BusManagement\Entities\Bus;
use Modules\RouteManagement\Entities\Route;
use Modules\RouteManagement\Http\Requests\RouteManagementRequest;
use Modules\RouteManagement\Transformers\RouteManagementResource;

class RouteManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $records = Route::all();
        $filtered_records = RouteManagementResource::collection($records);
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
    public function store(RouteManagementRequest $request)
    {
        $record = $request->all();
        $route = Route::create($record);
        return response($route, 200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $record = Route::findOrFail($id);
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
    public function update(RouteManagementRequest $request, $id)
    {
        $record = Route::findOrFail($id);
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
        $record = Route::findOrFail($id);
        $record = $record->delete();
        return response($record, 200);
    }
}
