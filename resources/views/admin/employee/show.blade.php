@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-dark">{{$user->name}} {{$user->lastname}}</h2>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-envelope"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.customers.customer.email'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$user->email}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-map-marked-alt"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.customers.customer.address'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$user->address}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small">
            <i class="fas fa-phone"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.customers.customer.phone'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$user->phone}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small">
            <i class="far fa-calendar-alt"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.employees.employee.employed_from'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{date('d.M.Y', strtotime($user->employed_from))}}</strong>
        </div>
    </div>
    <hr>
    @if($user->role)
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small">
            <i class="fas fa-user-tag"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.employees.employee.user-role'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$user->role->name}}</strong>
        </div>
    </div>
    @endif
    <div class="row mt-5">
        <div class="col-md-3 col-sm-12 small">
            <a href="{{route('employees.edit', ['user' => $user->id])}}" class="btn btn-primary btn-sm w-100"><i class="fas fa-user-edit"></i> {{__('messages.admin.general.edit')}}</a>
        </div>
    </div>
@endsection
