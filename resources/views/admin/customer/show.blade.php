@extends('layouts.admin')

@section('content')
    @include('admin.includes.breadcrumb', ['route' => 'customers.all', 'where' => __('messages.admin.menu.customers.plural_name')])
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-dark">{{$customer->fullName()}}</h2>
            <a href="{{route('customers.edit', ['customer' => $customer->id])}}" class="btn btn-primary btn-sm text-left"><i class="fas fa-user-edit"></i> {{__('messages.admin.general.edit')}}</a>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-envelope"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.customers.customer.email'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$customer->email}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-map-marked-alt"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.customers.customer.address'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$customer->address}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small">
            <i class="fas fa-phone"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.customers.customer.phone'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$customer->phone}}</strong>
        </div>
    </div>
    <hr>

    @if($customer->vehicles->isNotEmpty())
        <div class="row mt-2">
            <div class="col-md-1 col-sm-12 small">
                <i class="fas fa-car-side"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.vehicles.plural_name'))}}
            </div>
        <table id='vehicles' class="display" style="width:100%">
            <thead>
            <tr>
                <th>{{__('messages.admin.general.show')}}</th>
                <th>{{__('messages.admin.menu.vehicles.vehicle.type')}}</th>
                <th>{{__('messages.admin.menu.vehicles.vehicle.brand')}}</th>
                <th>{{__('messages.admin.menu.vehicles.vehicle.model')}}</th>
                <th>{{__('messages.admin.menu.vehicles.vehicle.year')}}</th>
                <th>{{__('messages.admin.menu.vehicles.vehicle.chassis_num')}}</th>
                <th>{{__('messages.admin.menu.vehicles.vehicle.engine_volume')}}</th>
                <th>{{__('messages.admin.menu.vehicles.vehicle.engine_power')}}</th>
                <th>{{__('messages.admin.menu.vehicles.vehicle.transmission')}}</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach($customer->vehicles as $vehicle)
                    <tr>
                        <td><a href="{{route('vehicles.show', ['vehicle' => $vehicle->id])}}" class="text-primary"><i class="fas fa-eye"></i> {{__('messages.admin.general.show')}}</a></td>
                        <td>{{$vehicle->type->type}}</td>
                        <td>{{$vehicle->brand()->name}}</td>
                        <td>{{$vehicle->model->name}}</td>
                        <td>{{$vehicle->year}}</td>
                        <td>{{$vehicle->chassis_num}}</td>
                        <td>{{$vehicle->engine_volume}}</td>
                        <td>{{$vehicle->engine_power}}</td>
                        <td>{{$vehicle->transmission}}</td>
                        <td class="text-center">
                            @can('update', $vehicle)
                                <a href="{{route('customers.edit', ['customer' => $vehicle->id])}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        </div>
    @endif

    @if($customer->services()->isNotEmpty())
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
                @foreach($customer->services() as $service)
                    <tr>
                        <td><a href="{{route('services.show', ['service' => $service->id])}}" class="text-primary"><i class="fas fa-eye"></i> {{__('messages.admin.general.show')}}</a></td>
                        <td><a href="#" class="text-dark">({{$service->vehicle->type->type}}) - {{$service->vehicle->brand()->name}} - {{$service->vehicle->model->name}}</a></td>
                        <td>{{$customer->fullName()}}</td>
                        <td>{{$service->name}}</td>
                        <td>{{$service->description}}</td>
                        <td>{{$service->kilometers}}</td>
                        <td>{{$service->time_spent}}</td>
                        <td>{{$service->price}}</td>
                        <td>{{$service->employee->fullName()}}</td>
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
            $('#vehicles, #services').DataTable({
                searching: false,
                paging: true,
                info: false,
                ordering: false
            });
        });

    </script>
@endsection
