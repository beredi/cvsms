<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Vehicle::class);

        return view('admin.vehicle.index', ['vehicles' => Vehicle::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Vehicle::class);

        return view('admin.vehicle.create',[
            'types' => VehicleType::all()->sortBy('type'),
            'brands' => VehicleBrand::all()->sortBy('name'),
            'customers' => Customer::all()->sortBy('name'),
            'years' => self::getYears()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Vehicle::class);

        $vehicle = new Vehicle();
        $vehicle->type()->associate(VehicleType::findOrFail($request->get('type')));
        $vehicle->model()->associate(VehicleModel::findOrFail($request->get('model')));
        if ($request->get('customers') !== null) $vehicle->customer()->associate(Customer::findOrFail($request->get('customers')));
        if ($request->get('engine_volume') !== null) $vehicle->setEngineVolumeAttribute($request->get('engine_volume'));
        if ($request->get('engine_power') !== null) $vehicle->setEnginePowerAttribute($request->get('engine_power'));
        if ($request->get('transmission') !== null) $vehicle->setTransmissionAttribute($request->get('transmission'));
        if ($request->get('chassis_num') !== null) $vehicle->setChassisNumAttribute($request->get('chassis_num'));
        if ($request->get('year') !== null) $vehicle->setYearAttribute($request->get('year'));
        $vehicle->save();

        session()->flash('vehicle-created', __('messages.admin.menu.vehicles.messages.vehicle_created'));

        return redirect(route('vehicles.all'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $this->authorize('update', Vehicle::class);

        return view('admin.vehicle.edit', [
            'vehicle' => $vehicle,
            'types' => VehicleType::all()->sortBy('type'),
            'brands' => VehicleBrand::all()->sortBy('name'),
            'models' => VehicleBrand::findOrFail($vehicle->brand()->id)->models,
            'customers' => Customer::all()->sortBy('name'),
            'years' => self::getYears()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $this->authorize('update', Vehicle::class);

        $vehicle->type()->associate(VehicleType::findOrFail($request->get('type')));
        $vehicle->model()->associate(VehicleModel::findOrFail($request->get('model')));
        $vehicle->customer()->associate(Customer::findOrFail($request->get('customers')));

        $vehicle->setYearAttribute($request->get('year'));
        $vehicle->setChassisNumAttribute($request->get('chassis_num'));
        $vehicle->setTransmissionAttribute($request->get('transmission'));
        $vehicle->setEnginePowerAttribute($request->get('engine_power'));
        $vehicle->setEngineVolumeAttribute($request->get('engine_volume'));

        $vehicle->save();
        session()->flash('vehicle-updated', __('messages.admin.menu.vehicles.messages.vehicle_updated'));

        return redirect(route('vehicles.all'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->authorize('delete', Vehicle::class);
        $vehicle = Vehicle::findOrFail($request->get('thing_id'));
        $vehicle->delete();

        session()->flash('vehicle-deleted', __('messages.admin.menu.vehicles.messages.vehicle_deleted'));
        return redirect()->back();
    }

    /**
     * @param $topic
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function config($topic){
        $brands = null;
        if ($topic == Vehicle::VEHICLE_BRAND){
            $stuff = VehicleBrand::all();
        }
        elseif ($topic == Vehicle::VEHICLE_MODEL){
            $brands = VehicleBrand::all()->sortBy("name");
            $stuff = null;
        }
        else{
            $stuff = VehicleType::all();
        }
        return view('admin.vehicle.config', ['stuff' => $stuff, 'topic' => $topic, 'brands' => $brands]);
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

    /**
     * @return array
     */
    public static function getYears(){
        $years = array();
        for ($i = 1885; $i<=date('Y'); $i++){
            $years[] = $i;
        }
        return array_reverse($years);
    }
}
