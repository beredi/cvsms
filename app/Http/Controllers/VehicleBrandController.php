<?php

namespace App\Http\Controllers;

use App\Models\VehicleBrand;
use Illuminate\Http\Request;

class VehicleBrandController extends Controller
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
        return view('admin.vehicle.configCreate', ['topic' => 'brand']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        VehicleBrand::create($request->all());
        session()->flash('vehicle-type-created', __('messages.admin.menu.vehicles.messages.type_created', ['type' => 'Brand']));
        return redirect(route('vehicles.config', ['topic' => 'brand']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleBrand  $vehicleBrand
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleBrand $vehicleBrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleBrand  $vehicleBrand
     * @return \Illuminate\Http\Response
     */
    public function edit($brand)
    {
        return view('admin.vehicle.editTopic', ['topic' => 'brand', 'brand' => VehicleBrand::findOrFail($brand)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VehicleBrand  $vehicleBrand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type)
    {
        $brand = VehicleBrand::findOrFail($type);
        $brand->update($request->all());
        session()->flash('vehicle-type-updated', __('messages.admin.menu.vehicles.messages.type_updated', ['type' => 'Brand']));

        return redirect(route('vehicles.config', ['topic' => 'brand']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleBrand  $vehicleBrand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $brand = VehicleBrand::findOrFail($request['thing_id']);
        $brand->delete();
        session()->flash('vehicle-type-deleted', __('messages.admin.menu.vehicles.messages.type_deleted', ['type' => 'Brand']));
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxHandler(Request $request){
        $brandId = $request->get('brandID');
        $modelsArray = VehicleBrand::findOrFail($brandId)->modelsToArray();

        return response()->json(array($modelsArray), 200);
    }
}
