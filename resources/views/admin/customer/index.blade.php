@extends('layouts.admin')

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('customer-deleted'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                {{ \Illuminate\Support\Facades\Session::get('customer-deleted') }}
            </div>
        </div>
    </div>
    @elseif(\Illuminate\Support\Facades\Session::has('customer-updated'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{ \Illuminate\Support\Facades\Session::get('customer-updated') }}
                </div>
            </div>
        </div>
    @elseif(\Illuminate\Support\Facades\Session::has('customer-created'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{ \Illuminate\Support\Facades\Session::get('customer-created') }}
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <h2 class="float-left">{{__('messages.admin.menu.customers.all-records')}}</h2>
            @can('create', \App\Models\Customer::class)
            <a href="{{route('customers.create')}}" class="float-right btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> {{__('messages.admin.menu.customers.new-record')}}</a>
            @endcan
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
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
                        <td>{{$customer->fullName()}}</td>
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
