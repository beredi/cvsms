@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="float-left">{{__('messages.admin.menu.services.all-records')}}</h2>
            @can('create', \App\Models\Vehicle::class)
                <a href="{{route('services.create')}}" class="float-right btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> {{__('messages.admin.menu.services.new-record')}}</a>
            @endcan
        </div>
    </div>

    @if(\Illuminate\Support\Facades\Session::has('service-deleted'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    {{ \Illuminate\Support\Facades\Session::get('service-deleted') }}
                </div>
            </div>
        </div>
    @elseif(\Illuminate\Support\Facades\Session::has('service-updated'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{ \Illuminate\Support\Facades\Session::get('service-updated') }}
                </div>
            </div>
        </div>
    @elseif(\Illuminate\Support\Facades\Session::has('service-created'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{ \Illuminate\Support\Facades\Session::get('service-created') }}
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <table id='all-services' class="display" style="width:100%">
                <thead>
                <tr>
                    <th><i class="fas fa-coins"></i></th>
                    <th><i class="far fa-eye"></i></th>
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
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if($services->isNotEmpty())
                    @foreach($services as $service)
                        <tr>
                            <td>
                                <div class="pay
                                @if($service->paid == $service->price)
                                    paid
                                @else
                                    unpaid
                                @endif
                                    "
                                     title="

                                @if($service->paid == $service->price)
                                     {{__('messages.admin.menu.services.service.paid')}}
                                @else
                                     {{__('messages.admin.menu.services.service.unpaid')}}
                                @endif
                                "></div>
                            </td>
                            <td class="text-center">
                                <a href="{{route('services.show', ['service' => $service->id])}}" class="text-primary" title="{{__('messages.admin.general.show')}}">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                            <td><a href="{{route('vehicles.show', ['vehicle' => $service->vehicle->id])}}" class="text-secondary">({{$service->vehicle->type->type}}) - {{$service->vehicle->brand()->name}} - {{$service->vehicle->model->name}}</a></td>
                            <td><a class="text-dark" href="{{route('customers.show', ['customer' => $service->vehicle->customer->id])}}">{{$service->vehicle->customer->fullName()}}</a></td>
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
                            <td class="text-center">
                                @can('delete', $service)
                                    <a href="#" data-id="{{$service->id}}" class="btn btn-sm btn-danger delete-button"  data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash-alt"></i></a>


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
                    <form action="{{route('services.delete')}}" method="POST">
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

    <script>
        $(document).ready(function() {
            $('body').on('click','.delete-button',function (){
                $('#thing_id').val($(this).data('id'));
            });
        });

        $(document).ready(function() {
            $('#all-services').DataTable( {
                "order": []
            } );
        });
    </script>
@endsection
