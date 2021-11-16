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
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Name</td>
                <td>Lastname</td>
                <td>+381 66666</td>
                <td>Test Street 333</td>
                <td>test@test</td>
                <td>123456</td>
                <td>1211</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>Lastname</td>
                <td>+381 66666</td>
                <td>Test Street 333</td>
                <td>test@test</td>
                <td>123456</td>
                <td>1211</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>Lastname</td>
                <td>+381 66666</td>
                <td>Test Street 333</td>
                <td>test@test</td>
                <td>123456</td>
                <td>1211</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>Lastname</td>
                <td>+381 66666</td>
                <td>Test Street 333</td>
                <td>test@test</td>
                <td>123456</td>
                <td>1211</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>Lastname</td>
                <td>+381 66666</td>
                <td>Test Street 333</td>
                <td>test@test</td>
                <td>123456</td>
                <td>1211</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>Lastname</td>
                <td>+381 66666</td>
                <td>Test Street 333</td>
                <td>test@test</td>
                <td>123456</td>
                <td>1211</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>Lastname</td>
                <td>+381 66666</td>
                <td>Test Street 333</td>
                <td>test@test</td>
                <td>123456</td>
                <td>1211</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>Lastname</td>
                <td>+381 66666</td>
                <td>Test Street 333</td>
                <td>test@test</td>
                <td>123456</td>
                <td>1211</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>Lastname</td>
                <td>+381 66666</td>
                <td>Test Street 333</td>
                <td>test@test</td>
                <td>123456</td>
                <td>1211</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>Lastname</td>
                <td>+381 66666</td>
                <td>Test Street 333</td>
                <td>test@test</td>
                <td>123456</td>
                <td>1211</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>Lastname</td>
                <td>+381 66666</td>
                <td>Test Street 333</td>
                <td>test@test</td>
                <td>123456</td>
                <td>1211</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>Lastname</td>
                <td>+381 66666</td>
                <td>Test Street 333</td>
                <td>test@test</td>
                <td>123456</td>
                <td>1211</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>Lastname</td>
                <td>+381 66666</td>
                <td>Test Street 333</td>
                <td>test@test</td>
                <td>123456</td>
                <td>1211</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>Lastname</td>
                <td>+381 66666</td>
                <td>Test Street 333</td>
                <td>test@test</td>
                <td>123456</td>
                <td>1211</td>
            </tr>
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
