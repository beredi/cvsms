@extends('layouts.admin')

@section('content')
    @include('admin.includes.breadcrumb', ['route' => 'vehicles.all', 'where' => __('messages.admin.menu.vehicles.plural_name')])
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-22">
            <h2 class="text-dark"><span class="text-muted">{{__('messages.admin.menu.vehicles.name')}}</span> - {{$vehicle->displayName()}}</h2>
        </div>
    </div>
    @can('update', $vehicle)
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('vehicles.edit', ['vehicle' => $vehicle->id])}}" class="btn btn-primary btn-sm text-left"><i class="fas fa-user-edit"></i> {{__('messages.admin.general.edit')}}</a>
            </div>
        </div>
    @endcan
    <hr>
    <div class="row mt-2">
        <div class="col-md-2 col-sm-12 small mt-1">
            <i class="fas fa-user-alt"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.customers.name'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary"><a href="{{route('customers.show', ['customer' => $vehicle->customer->id])}}">{{$vehicle->customer->fullName()}}</a></strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-2 col-sm-12 small mt-1">
            <i class="fas fa-car"></i> <strong>{{\Illuminate\Support\Str::upper(__('messages.admin.menu.vehicles.name'))}}</strong>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-2 col-sm-12 small mt-1">
            {{\Illuminate\Support\Str::upper(__('messages.admin.menu.vehicles.vehicle.type'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$vehicle->type->type}}</strong>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-2 col-sm-12 small mt-1">
            {{\Illuminate\Support\Str::upper(__('messages.admin.menu.vehicles.vehicle.brand'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$vehicle->brand()->name}}</strong>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-2 col-sm-12 small mt-1">
            {{\Illuminate\Support\Str::upper(__('messages.admin.menu.vehicles.vehicle.model'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$vehicle->model->name}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-2 col-sm-12 small mt-1">
            <i class="far fa-calendar-times"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.vehicles.vehicle.year'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$vehicle->year}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-2 col-sm-12 small mt-1">
            <i class="fas fa-sort-numeric-up"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.vehicles.vehicle.chassis_num'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$vehicle->chassis_num}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-2 col-sm-12 small mt-1">
            <i class="fas fa-car-battery"></i> <strong>{{\Illuminate\Support\Str::upper(__('messages.admin.menu.vehicles.vehicle.engine'))}}</strong>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-2 col-sm-12 small mt-1">
            {{\Illuminate\Support\Str::upper(__('messages.admin.menu.vehicles.vehicle.engine_power'))}} [cm^3]
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$vehicle->engine_power}}</strong>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-2 col-sm-12 small mt-1">
            {{\Illuminate\Support\Str::upper(__('messages.admin.menu.vehicles.vehicle.engine_volume'))}} [kW]
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$vehicle->engine_volume}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-2 col-sm-12 small mt-1">
            <i class="fas fa-cogs"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.vehicles.vehicle.transmission'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$vehicle->transmission}}</strong>
        </div>
    </div>
    @if($vehicle->services->isNotEmpty())
        <hr>
        <div class="row mt-2">
            <div class="col-md-1 col-sm-12 small">
                <i class="fas fa-cog"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.services.plural_name'))}} ({{count($vehicle->services)}})
            </div>
            @include('admin.service._allServices', ['services' => $vehicle->services, 'hide' => 'vehicle'])
        </div>
    @endif
@endsection

@section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $('#all-services').DataTable({
                searching: false,
                paging: true,
                info: false,
                ordering: false
            });
        });

    </script>
@endsection
