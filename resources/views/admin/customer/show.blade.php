@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-dark">{{$customer->fullName()}}</h2>
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
    <div class="row mt-5">
        <div class="col-md-3 col-sm-12 small">
            <a href="{{route('customers.edit', ['customer' => $customer->id])}}" class="btn btn-primary btn-sm w-100"><i class="fas fa-user-edit"></i> {{__('messages.admin.general.edit')}}</a>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $('#vehicles').DataTable({
                searching: false,
                paging: false,
                info: false,
                ordering: false
            });
        });

    </script>
@endsection
