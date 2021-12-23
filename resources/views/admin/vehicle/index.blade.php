@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="float-left">{{__('messages.admin.menu.vehicles.all-records')}}</h2>
            @can('create', \App\Models\Vehicle::class)
                <a href="{{route('vehicles.create')}}" class="float-right btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> {{__('messages.admin.menu.vehicles.new-record')}}</a>
            @endcan
        </div>
    </div>

    @if(\Illuminate\Support\Facades\Session::has('vehicle-deleted'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    {{ \Illuminate\Support\Facades\Session::get('vehicle-deleted') }}
                </div>
            </div>
        </div>
    @elseif(\Illuminate\Support\Facades\Session::has('vehicle-updated'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{ \Illuminate\Support\Facades\Session::get('vehicle-updated') }}
                </div>
            </div>
        </div>
    @elseif(\Illuminate\Support\Facades\Session::has('vehicle-created'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{ \Illuminate\Support\Facades\Session::get('vehicle-created') }}
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <table id='all-customers' class="display" style="width:100%">
                <thead>
                <tr>
                    <th>{{__('messages.admin.general.show')}}</th>
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
                            <td><a href="{{route('vehicles.show', ['vehicle' => $vehicle->id])}}" class="text-primary"><i class="fas fa-eye"></i> {{__('messages.admin.general.show')}}</a></td>
                            <td>{{$vehicle->type->type}}</td>
                            <td>{{$vehicle->brand()->name}}</td>
                            <td>{{$vehicle->model->name}}</td>
                            <td>
                                @if($vehicle->customer != null)
                                <a href="{{route('customers.show', ['customer' => $vehicle->customer->id])}}" class="text-dark">{{$vehicle->customer->fullname()}}</a>
                                @endif
                            </td>
                            <td>{{$vehicle->year}}</td>
                            <td>{{$vehicle->chassis_num}}</td>
                            <td>{{$vehicle->engine_volume}}</td>
                            <td>{{$vehicle->engine_power}}</td>
                            <td>{{$vehicle->transmission}}</td>
                            <td class="text-center">
                                @can('update', $vehicle)
                                    <a href="{{route('vehicles.edit', ['vehicle' => $vehicle->id])}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                @endcan
                            </td>
                            <td class="text-center">
                                @can('delete', \App\Models\Vehicle::class)
                                    <a href="#" data-id="{{$vehicle->id}}" class="btn btn-sm btn-danger delete-button"  data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash-alt"></i></a>


                                @endcan
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('messages.admin.general.delete')}}?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">{{__('messages.admin.general.delete_msg')}}</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">{{__('messages.admin.general.cancel')}}</button>
                    <form action="{{route('vehicles.delete')}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" value="" name="thing_id" id="thing_id">
                        <input type="submit" class="btn btn-danger" name="delete" value="{{__('messages.admin.general.delete')}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('body').on('click','.delete-button',function (){
                $('#thing_id').val($(this).data('id'));
            });
        });

    </script>
@endsection
