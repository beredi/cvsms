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

            @include('admin.customer._allCustomers', ['customers' => $customers])

        </div>
    </div>

@endsection

@section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $('#all-customers').DataTable();
        });
    </script>
@endsection
