@extends('layouts.admin')

@section('content')
    @include('admin.includes.breadcrumb', ['route' => 'services.all', 'where' => __('messages.admin.menu.services.plural_name')])
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-12">
            <h2 class="text-dark">{{__('messages.admin.menu.services.name')}}</h2>
        </div>
        <div class="col-md-3 col-sm-12 small">
            <a href="{{route('services.edit', ['service' => $service->id])}}" class="btn btn-primary btn-sm"><i class="fas fa-user-edit"></i> {{__('messages.admin.general.edit')}}</a>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-user-alt"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.customers.name'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary"><a href="{{route('customers.show', ['customer' => $service->customer()->id])}}">{{$service->customer()->fullName()}}</a></strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-car"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.vehicles.name'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary"><a href="{{route('vehicles.show', ['vehicle' => $service->vehicle->id])}}">{{$service->vehicle->displayName()}}</a></strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-pen"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.services.service.name'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$service->name}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-audio-description"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.services.service.description'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$service->description}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-bookmark"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.services.service.km'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$service->kilometers}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-stopwatch"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.services.service.time_spent'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$service->time_spent}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-dollar-sign"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.services.service.price'))}} [RSD]
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$service->price}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-calendar-alt"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.services.service.date'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{date('d.m.Y', strtotime($service->date))}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-user-tie"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.employees.name'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary"><a href="{{route('employees.show', ['user' => $service->employee->id])}}">{{$service->employee->fullName()}}</a></strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-user-tie"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.employees.name'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            @include('admin.stock._allItems', ['items' => $service->stock_items])
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#all-stock-items').DataTable( {
                "order": []
            } );
        });
    </script>
@endsection
