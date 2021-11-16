@extends('layouts.admin')

@section('content')

    <h1>{{__('messages.admin.menu.customers.all-records')}}</h1>

    <table id='all-customers' class="display" style="width:100%">
        <thead>
            <tr>
                <th>{{__('messages.admin.menu.customers.customer.name')}}</th>
                <th>{{__('messages.admin.menu.customers.customer.lastname')}}</th>
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
        @if($customers)
            @foreach($customers as $customer)
            <tr>
                <td>{{$customer->name}}</td>
                <td>{{$customer->lastname}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->id_card}}</td>
                <td>{{$customer->owe}}</td>
                <td class="text-center"><a href="#" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a></td>
                <td class="text-center"><a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@endsection

@section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection
