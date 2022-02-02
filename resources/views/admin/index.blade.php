@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>{{__('messages.admin.dashboard.welcome', ['name' => \Illuminate\Support\Facades\Auth::user()->name])}}</h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4 col-sm-12 dashboard-card-wrapper">
            <a href="{{route('services.create')}}">
                <div class="dashboard-card bg-gradient-danger">
                    <div class="display-1"><i class="fas fa-cog"></i></div>
                    <div class="h1">{{__('messages.admin.menu.service.new-record')}}</div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-sm-12 dashboard-card-wrapper">
            <a href="{{route('vehicles.create')}}">
                <div class="dashboard-card bg-gradient-success">
                    <div class="display-1"><i class="fas fa-car"></i></div>
                    <div class="h1">{{__('messages.admin.menu.vehicles.new-record')}}</div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-sm-12 dashboard-card-wrapper">
            <a href="{{route('customers.create')}}">
                <div class="dashboard-card bg-gradient-warning">
                    <div class="display-1"><i class="fas fa-users"></i></div>
                    <div class="h1">{{__('messages.admin.menu.customers.new-record')}}</div>
                </div>
            </a>
        </div>
    </div>

@endsection
