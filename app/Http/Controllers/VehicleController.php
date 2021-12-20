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
        $years = array();
        for ($i = 1885; $i<=date('Y'); $i++){
            $years[] = $i;
        }
        return view('admin.vehicle.create',[
            'types' => VehicleType::all()->sortBy('type'),
            'brands' => VehicleBrand::all()->sortBy('name'),
            'customers' => Customer::all()->sortBy('name'),
            'years' => $years
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
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
}
