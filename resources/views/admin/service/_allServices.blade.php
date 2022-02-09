@isset($hide)
@else
    @php
        $hide = false;
    @endphp
@endisset

<table id='all-services' class="display" style="width:100%">
    <thead>
    <tr>
        <th><i class="fas fa-coins"></i></th>
        <th><i class="far fa-eye"></i></th>
        @if($hide !== 'vehicle')
            <th>{{__('messages.admin.menu.vehicles.name')}}</th>
        @endif
        @if($hide !== 'customer')
            <th>{{__('messages.admin.menu.customers.name')}}</th>
        @endif
        <th>{{__('messages.admin.menu.services.service.name')}}</th>
        <th>{{__('messages.admin.menu.services.service.description')}}</th>
        <th>{{__('messages.admin.menu.services.service.km')}}</th>
        <th>{{__('messages.admin.menu.services.service.time_spent')}} [h]</th>
        <th>{{__('messages.admin.menu.services.service.price')}} [RSD]</th>
        @if($hide !== 'employee')
            <th>{{__('messages.admin.menu.employees.name')}}</th>
        @endif
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
                @if($hide !== 'vehicle')
                    <td>
                        <a href="{{route('vehicles.show', ['vehicle' => $service->vehicle->id])}}" class="text-secondary">
                            ({{$service->vehicle->type->type}}) - {{$service->vehicle->brand()->name}} - {{$service->vehicle->model->name}}
                        </a>
                    </td>
                @endif
                @if($hide !== 'customer')
                    <td>
                        <a class="text-dark" href="{{route('customers.show', ['customer' => $service->vehicle->customer->id])}}">
                            {{$service->vehicle->customer->fullName()}}
                        </a>
                    </td>
                @endif
                <td>{{$service->name}}</td>
                <td>{{$service->description}}</td>
                <td>{{$service->kilometers}}</td>
                <td>{{$service->time_spent}}</td>
                <td>{{$service->price}}</td>
                @if($hide !== 'employee')
                    <td><a href="{{route('employees.show', ['user' => $service->employee->id])}}" class="text-secondary">{{$service->employee->fullName()}}</a></td>
                @endif
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
