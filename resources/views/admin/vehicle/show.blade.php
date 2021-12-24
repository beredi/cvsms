@extends('layouts.admin')

@section('content')
    @include('admin.includes.breadcrumb', ['route' => 'vehicles.all', 'where' => __('messages.admin.menu.vehicles.plural_name')])
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-22">
            <h2 class="text-dark">{{__('messages.admin.menu.vehicles.name')}}</h2>
        </div>
    </div>
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
                <i class="fas fa-cog"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.services.plural_name'))}}
            </div>
            <table id='services' class="display" style="width:100%">
                <thead>
                <tr>
                    <th>{{__('messages.admin.general.show')}}</th>
                    <th>{{__('messages.admin.menu.vehicles.name')}}</th>
                    <th>{{__('messages.admin.menu.customers.name')}}</th>
                    <th>{{__('messages.admin.menu.services.service.name')}}</th>
                    <th>{{__('messages.admin.menu.services.service.description')}}</th>
                    <th>{{__('messages.admin.menu.services.service.km')}}</th>
                    <th>{{__('messages.admin.menu.services.service.time_spent')}} [h]</th>
                    <th>{{__('messages.admin.menu.services.service.price')}} [RSD]</th>
                    <th>{{__('messages.admin.menu.employees.name')}}</th>
                    <th>{{__('messages.admin.menu.services.service.date')}}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($vehicle->services as $service)
                    <tr>
                        <td><a href="{{route('services.show', ['service' => $service->id])}}" class="text-primary"><i class="fas fa-eye"></i> {{__('messages.admin.general.show')}}</a></td>
                        <td><a href="#" class="text-dark">({{$service->vehicle->type->type}}) - {{$service->vehicle->brand()->name}} - {{$service->vehicle->model->name}}</a></td>
                        <td><a href="{{route('customers.show', ['customer' => $service->customer()->id])}}" class="text-secondary">{{$vehicle->customer->fullName()}}</a></td>
                        <td>{{$service->name}}</td>
                        <td>{{$service->description}}</td>
                        <td>{{$service->kilometers}}</td>
                        <td>{{$service->time_spent}}</td>
                        <td>{{$service->price}}</td>
                        <td><a href="{{route('employees.show', ['user' => $service->employee->id])}}" class="text-secondary">{{$service->employee->fullName()}}</a></td>
                        <td>{{date('d. m. Y.', strtotime($service->date))}}</td>
                        <td class="text-center">
                            @can('update', $service)
                                <a href="{{route('services.edit', ['service' => $service->id])}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
            $('#services').DataTable({
                searching: false,
                paging: true,
                info: false,
                ordering: false
            });
        });

    </script>
@endsection
