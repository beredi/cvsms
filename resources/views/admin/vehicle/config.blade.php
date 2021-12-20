@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>{{__('messages.admin.menu.vehicles.vehicles_config')}}</h2>
        </div>
    </div>
    <div class="row tab-header">
        <div class="col-md-12">
            <ul class="float-left menu-cards">
                <li @if($topic==\App\Models\Vehicle::VEHICLE_TYPE) class="active" @endif>
                    <a href="{{route('vehicles.config', ['topic' => \App\Models\Vehicle::VEHICLE_TYPE])}}">{{__('messages.admin.menu.vehicles.vehicle.types')}}</a>
                </li>
                <li @if($topic==\App\Models\Vehicle::VEHICLE_BRAND) class="active" @endif>
                    <a href="{{route('vehicles.config', ['topic' => \App\Models\Vehicle::VEHICLE_BRAND])}}">{{__('messages.admin.menu.vehicles.vehicle.brands')}}</a>
                </li>
                <li @if($topic==\App\Models\Vehicle::VEHICLE_MODEL) class="active" @endif>
                    <a href="{{route('vehicles.config', ['topic' => \App\Models\Vehicle::VEHICLE_MODEL])}}">{{__('messages.admin.menu.vehicles.vehicle.models')}}</a>
                </li>
            </ul>
            <ul class="float-right">
                <li><a href="{{route('vehicle'.$topic.'.create')}}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> {{__('messages.admin.general.add')}} {{$topic}}</a></li>
            </ul>
        </div>
    </div>
    @if(\Illuminate\Support\Facades\Session::has('vehicle-type-deleted'))
    <div class="row" style="clear: both;">
        <div class="col-md-12">
            <div class="alert alert-danger">
                {{\Illuminate\Support\Facades\Session::get('vehicle-type-deleted')}}
            </div>
        </div>
    </div>
    @elseif(\Illuminate\Support\Facades\Session::has('vehicle-type-created'))
        <div class="row" style="clear: both;">
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{\Illuminate\Support\Facades\Session::get('vehicle-type-created')}}
                </div>
            </div>
        </div>
    @elseif(\Illuminate\Support\Facades\Session::has('vehicle-type-updated'))
        <div class="row" style="clear: both;">
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{\Illuminate\Support\Facades\Session::get('vehicle-type-updated')}}
                </div>
            </div>
        </div>
    @endif
    <div class="row" style="clear: both;">
        <div class="col-md-12">
                @csrf
            @if($topic == \App\Models\Vehicle::VEHICLE_MODEL)
                <div class="form-group">
                        <label for="{{\App\Models\Vehicle::VEHICLE_MODEL}}" class="required">
                            {{ __('messages.admin.menu.vehicles.vehicle.'.\App\Models\Vehicle::VEHICLE_MODEL) }}
                        </label>
                        <div class="control-group">
                            <select name="{{$topic}}" required id="{{$topic}}" placeholder="{{__('messages.admin.general.search-for')}}">
                                <option value=""></option>
                                @if($brands !== null and $brands->isNotEmpty())
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="vehicleTypes" class="display" data-role="{{$topic}}">
                <thead>
                    <tr>
                        <th style="width: 90%">{{__('messages.admin.menu.vehicles.vehicle.name')}}</th>
                        <th style="width: 5%">{{__('messages.admin.general.edit')}}</th>
                        <th style="width: 5%">{{__('messages.admin.general.delete')}}</th>
                    </tr>
                </thead>
                <tbody>
                @if($stuff !== null and $stuff->isNotEmpty())
                    @foreach($stuff as $thing)
                        <tr>
                            <td style="width: 90%">
                                @if($topic == \App\Models\Vehicle::VEHICLE_TYPE)
                                    {{$thing->type}}
                                @else
                                    {{$thing->name}}
                                @endif
                            </td>
                            <td style="width: 5%">
                                <a href="{{route('vehicle'.$topic.'.edit', ['type' => $thing->id])}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            </td>
                            <td style="width: 5%" class="delete-coll">
                                <a href="#" class="btn btn-sm btn-danger delete-user" data-toggle="modal" data-target="#deleteModal" data-id="{{$thing->id}}"><i class="fas fa-trash-alt"></i></a>
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
                    <form action="{{route('vehicle'.$topic.'.delete')}}" method="POST">
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
    <script src="{{asset('js/handlers/vehicles.js')}}"></script>

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            var $topic = $('table').data('role');
            if ($topic == 'model'){
                $('#vehicleTypes').DataTable({
                    searching: false,
                    paging: false,
                    info: false,
                    ordering: false
                });
            }
            else{
                $('#vehicleTypes').DataTable();
            }

            $('#{{\App\Models\Vehicle::VEHICLE_MODEL}}').selectize();

            $('body').on('click','.delete-user',function (){
                $('#thing_id').val($(this).data('id'));
            });

        });
    </script>
@endsection
