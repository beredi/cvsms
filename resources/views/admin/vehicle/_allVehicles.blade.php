@isset($hide)
@else
    @php
        $hide = false;
    @endphp
@endisset
<table id='all-vehicles' class="display" style="width:100%">
    <thead>
    <tr>
        <th>{{__('messages.admin.general.show')}}</th>
        <th>{{__('messages.admin.menu.vehicles.vehicle.type')}}</th>
        <th>{{__('messages.admin.menu.vehicles.vehicle.brand')}}</th>
        <th>{{__('messages.admin.menu.vehicles.vehicle.model')}}</th>
        @if($hide !== 'customer')
            <th>{{__('messages.admin.menu.customers.name')}}</th>
        @endif
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
                @if($hide !== 'customer')
                    <td>
                        @if($vehicle->customer != null)
                            <a href="{{route('customers.show', ['customer' => $vehicle->customer->id])}}" class="text-dark">{{$vehicle->customer->fullname()}}</a>
                        @endif
                    </td>
                @endif
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
