<?php

namespace App\Http\Controllers;

use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class VehicleModelController extends Controller
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
        return view('admin.vehicle.configCreate', ['topic' => 'model', 'brands' => VehicleBrand::all()->sortBy('name')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new VehicleModel();
        $model->setNameAttribute($request->get('name'));
        $model->brand()->associate(VehicleBrand::findOrFail($request->get('model')));
        $model->save();

        session()->flash('vehicle-type-created', __('messages.admin.menu.vehicles.messages.type_created', ['type' => 'Model']));
        return redirect(route('vehicles.config', ['topic' => 'model']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleModel $vehicleModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function edit($model)
    {
        return view('admin.vehicle.editTopic', ['topic' => 'model', 'brand' => VehicleModel::findOrFail($model)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type)
    {
        $brand = VehicleModel::findOrFail($type);
        $brand->update($request->all());
        session()->flash('vehicle-type-updated', __('messages.admin.menu.vehicles.messages.type_updated', ['type' => 'Model']));

        return redirect(route('vehicles.config', ['topic' => 'model']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $brand = VehicleModel::findOrFail($request['thing_id']);
        $brand->delete();
        session()->flash('vehicle-type-deleted', __('messages.admin.menu.vehicles.messages.type_deleted', ['type' => 'Model']));
        return redirect()->back();
    }
}
