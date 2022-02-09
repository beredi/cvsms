<table id='all-customers' class="display" style="width:100%">
    <thead>
    <tr>
        <th>{{__('messages.admin.menu.customers.customer.name')}}</th>
        <th>{{__('messages.admin.menu.customers.customer.phone')}}</th>
        <th>{{__('messages.admin.menu.customers.customer.address')}}</th>
        <th>{{__('messages.admin.menu.customers.customer.email')}}</th>
        <th>{{__('messages.admin.menu.customers.customer.id_card')}}</th>
        <th>{{__('messages.admin.menu.customers.customer.owe')}}</th>
        <th>{{__('messages.admin.general.edit')}}</th>
        <th>{{__('messages.admin.general.delete')}}</th>
    </tr>
    </thead>
    <tbody>
    @if($customers->isNotEmpty())
        @foreach($customers as $customer)
            <tr>
                <td><a href="{{route('customers.show', ['customer' => $customer->id])}}" class="text-dark">{{$customer->fullName()}}</a></td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->id_card}}</td>
                <td>{{$customer->owe}}</td>
                <td class="text-center">
                    @can('update', $customer)
                        <a href="{{route('customers.edit', ['customer' => $customer->id])}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    @endcan
                </td>
                <td class="text-center">
                    @can('delete', $customer)
                        <a href="#" class="btn btn-sm btn-danger"  data-toggle="modal" data-target="#deleteModal{{$customer->id}}"><i class="fas fa-trash-alt"></i></a>

                        <!-- Delete Modal-->
                        <div class="modal fade" id="deleteModal{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{__('messages.admin.general.delete')}}?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">{{__('messages.admin.menu.customers.delete_customer', ['name' => $customer->name, 'lastname' => $customer->lastname])}}</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">{{__('messages.admin.general.cancel')}}</button>
                                        <a class="btn btn-danger" href="#" onclick="event.preventDefault();document.getElementById('delete-form'+{{$customer->id}}).submit();">{{__('messages.admin.general.delete')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form id="delete-form{{$customer->id}}" action="{{route('customers.delete', ['customer' => $customer->id])}}" method="POST" class="d-none">
                            @method('DELETE')
                            @csrf
                        </form>
                    @endcan
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
