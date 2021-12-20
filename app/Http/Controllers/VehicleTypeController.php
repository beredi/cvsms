<?php

namespace App\Http\Controllers;

use App\Models\VehicleBrand;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vehicle.configCreate', ['topic' => 'type']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        VehicleType::create($request->all());
        session()->flash('vehicle-type-created', __('messages.admin.menu.vehicles.messages.type_created', ['type' => 'Type']));
        return redirect(route('vehicles.config', ['topic' => 'type']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleType $vehicleType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function edit($type)
    {
        return view('admin.vehicle.editTopic', ['topic' => 'type', 'brand' => VehicleType::findOrFail($type)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type)
    {
        $typeM = VehicleType::findOrFail($type);
        $typeM->update($request->all());
        session()->flash('vehicle-type-updated', __('messages.admin.menu.vehicles.messages.type_updated', ['type' => 'Type']));

        return redirect(route('vehicles.config', ['topic' => 'type']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $brand = VehicleType::findOrFail($request['thing_id']);
        $brand->delete();
        session()->flash('vehicle-type-deleted', __('messages.admin.menu.vehicles.messages.type_deleted', ['type' => 'Type']));
        return redirect()->back();
    }
}
