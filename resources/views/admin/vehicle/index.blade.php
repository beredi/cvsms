@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="float-left">{{__('messages.admin.menu.vehicles.all-records')}}</h2>
            @can('create', \App\Models\Vehicle::class)
                <a href="{{route('customers.create')}}" class="float-right btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> {{__('messages.admin.menu.customers.new-record')}}</a>
            @endcan
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id='all-customers' class="display" style="width:100%">
                <thead>
                <tr>
                    <th>{{__('messages.admin.menu.vehicles.vehicle.type')}}</th>
                    <th>{{__('messages.admin.menu.vehicles.vehicle.brand')}}</th>
                    <th>{{__('messages.admin.menu.vehicles.vehicle.model')}}</th>
                    <th>{{__('messages.admin.menu.customers.name')}}</th>
                    <th>{{__('messages.admin.menu.vehicles.vehicle.year')}}</th>
                    <th>{{__('messages.admin.menu.vehicles.vehicle.chassis_num')}}</th>
                    <th>{{__('messages.admin.menu.vehicles.vehicle.engine_volume')}}</th>
                    <th>{{__('messages.admin.menu.vehicles.vehicle.engine_power')}}</th>
                    <th>{{__('messages.admin.menu.vehicles.vehicle.transmission')}}</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if($vehicles->isNotEmpty())
                    @foreach($vehicles as $vehicle)
                        <tr>
                            <td>{{$vehicle->type->type}}</td>
                            <td>{{$vehicle->brand()->name}}</td>
                            <td>{{$vehicle->model->name}}</td>
                            <td><a href="{{route('customers.show', ['customer' => $vehicle->customer->id])}}" class="text-dark">{{$vehicle->customer->fullname()}}</a></td>
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
                            <td class="text-center">
                                @can('delete', \App\Models\Vehicle::class)
                                    <a href="#" class="btn btn-sm btn-danger"  data-toggle="modal" data-target="#deleteModal{{$vehicle->id}}"><i class="fas fa-trash-alt"></i></a>


                                @endcan
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection
