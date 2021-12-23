<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Service;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Service::class);

        return view('admin.service.index', ['services' => Service::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Service::class);

        return view('admin.service.create', ['customers' => Customer::all()->sortBy('name')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicle = Vehicle::findOrFail($request->get('vehicle'));
        $service = new Service();
        $service->vehicle()->associate($vehicle);
        $service->name = $request->get('name');
        $service->description = $request->get('description');
        $service->kilometers = $request->get('kilometers');
        $service->time_spent = $request->get('time_spent');
        $service->price = $request->get('price');
        $service->price = $request->get('price');
        $service->date = $request->get('date');
        $service->employee()->associate(Auth::user());

        $service->save();
        session()->flash('service-created', __('messages.admin.menu.services.messages.service_created'));

        return redirect(route('services.all'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $this->authorize('view', $service);

        return view('admin.service.show', ['service' => $service]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $this->authorize('update', $service);

        return view('admin.service.edit', [
            'service' => $service,
            'customers' => Customer::all()->sortBy('name')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $this->authorize('update', $service);

        $vehicle = Vehicle::findOrFail($request->get('vehicle'));

        $service->vehicle()->associate($vehicle);
        $service->name = $request->get('name');
        $service->description = $request->get('description');
        $service->kilometers = $request->get('kilometers');
        $service->time_spent = $request->get('time_spent');
        $service->price = $request->get('price');
        $service->price = $request->get('price');
        $service->date = $request->get('date');
        $service->employee()->associate(Auth::user());

        $service->save();
        session()->flash('service-updated', __('messages.admin.menu.services.messages.service_updated'));

        return redirect(route('services.all'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $service = Service::findOrFail($request->get('thing_id'));
        $this->authorize('delete', $service);

        $service->delete();
        session()->flash('service-deleted', __('messages.admin.menu.services.messages.service_deleted'));

        return redirect()->back();
    }
}