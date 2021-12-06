@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-5 col-md-12">
            <h2>{{__('messages.admin.menu.customers.new-record')}}</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('customers.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{__('messages.admin.menu.customers.customer.name')}}</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="required" for="lastname">{{__('messages.admin.menu.customers.customer.lastname')}}</label>
                    <input type="text" name="lastname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="required" for="phone">{{__('messages.admin.menu.customers.customer.phone')}}</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label class="required" for="email">{{__('messages.admin.menu.customers.customer.email')}}</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label class="required" for="address">{{__('messages.admin.menu.customers.customer.address')}}</label>
                    <input type="text" name="address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="id_card">{{__('messages.admin.menu.customers.customer.id_card')}}</label>
                    <input type="number" name="id_card" class="form-control">
                </div>
                <div class="form-group">
                    <label for="owe">{{__('messages.admin.menu.customers.customer.owe')}}</label>
                    <input type="number" name="owe" class="form-control" step="0.01">
                </div>
                <div class="form-group">
                    <input type="submit" name="create_customer" id="create_customer" value="{{__('messages.admin.menu.customers.new-record')}}" class="btn btn-lg btn-success">
                </div>
            </form>
        </div>
    </div>

@endsection