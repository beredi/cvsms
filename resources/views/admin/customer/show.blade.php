@extends('layouts.admin')

@section('content')
    @include('admin.includes.breadcrumb', ['route' => 'customers.all', 'where' => __('messages.admin.menu.customers.plural_name')])
    @can('update', $customer)
    <div class="row">
        <div class="col-md-6">
            <h2 class="text-dark">{{$customer->fullName()}}</h2>
            <a href="{{route('customers.edit', ['customer' => $customer->id])}}" class="btn btn-primary btn-sm text-left"><i class="fas fa-user-edit"></i> {{__('messages.admin.general.edit')}}</a>
        </div>
        <div class="col-md-6">
            <div class="owe-display float-right
                @if($customer->owe == 0)
                    paid
                @else
                    unpaid
                @endif
                ">
                <i class="fas fa-dollar-sign"></i> {{__('messages.admin.menu.customers.customer.owe')}}: <strong>{{ ($customer->owe) ? $customer->owe : 0 }} RSD</strong>
            </div>
        </div>
    </div>
    @endcan
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-envelope"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.customers.customer.email'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$customer->email}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-map-marked-alt"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.customers.customer.address'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$customer->address}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small">
            <i class="fas fa-phone"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.customers.customer.phone'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$customer->phone}}</strong>
        </div>
    </div>

    @if($customer->vehicles->isNotEmpty())
        <hr>
        <div class="row mt-2">
            <div class="col-md-1 col-sm-12 small">
                <i class="fas fa-car-side"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.vehicles.plural_name'))}}  ({{count($customer->vehicles)}})
            </div>

            @include('admin.vehicle._allVehicles', ['vehicles' => $customer->vehicles, 'hide' => 'customer'])

        </div>
    @endif

    @if($customer->services()->isNotEmpty())
        <hr>
        <div class="row mt-2">
            <div class="col-md-1 col-sm-12 small">
                <i class="fas fa-cog"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.services.plural_name'))}} ({{count($customer->services())}})
            </div>

            @include('admin.service._allServices', ['services' => $customer->services(), 'hide' => 'customer'])

        </div>
    @endif
@endsection

@section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $('#all-vehicles, #all-services').DataTable({
                searching: false,
                paging: true,
                info: false,
                ordering: false
            });
        });

    </script>
@endsection
