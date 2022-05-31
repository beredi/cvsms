@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-5 col-md-12">
            <h2>{{__('messages.admin.menu.company.name')}} <strong>{{$company->name}}</strong></h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('companies.update', ['company' => $company->id])}}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{__('messages.admin.menu.company.company.name')}}</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{$company->name}}">
                </div>
                <div class="form-group">
                    <label for="street">{{__('messages.admin.menu.company.company.street')}}</label>
                    <input type="text" name="street" class="form-control @error('street') is-invalid @enderror" value="{{$company->street}}">
                </div>
                <div class="form-group">
                    <label for="street_number">{{__('messages.admin.menu.company.company.street_number')}}</label>
                    <input type="text" name="street_number" class="form-control @error('street_number') is-invalid @enderror" value="{{$company->street_number}}">
                </div>
                <div class="form-group">
                    <label for="city">{{__('messages.admin.menu.company.company.city')}}</label>
                    <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{$company->city}}">
                </div>
                <div class="form-group">
                    <label for="zip">{{__('messages.admin.menu.company.company.zip')}}</label>
                    <input type="text" name="zip" class="form-control @error('zip') is-invalid @enderror" value="{{$company->zip}}">
                </div>
                <div class="form-group">
                    <label for="pib">{{__('messages.admin.menu.company.company.pib')}}</label>
                    <input type="text" name="pib" class="form-control @error('pib') is-invalid @enderror" value="{{$company->pib}}">
                </div>
                <div class="form-group">
                    <label for="unique_number">{{__('messages.admin.menu.company.company.unique_number')}}</label>
                    <input type="text" name="unique_number" class="form-control @error('unique_number') is-invalid @enderror" value="{{$company->unique_number}}">
                </div>
                <div class="form-group">
                    <label for="bank_account">{{__('messages.admin.menu.company.company.bank_account')}}</label>
                    <input type="text" name="bank_account" class="form-control @error('bank_account') is-invalid @enderror" value="{{$company->bank_account}}">
                </div>
                <div class="form-group">
                    <label for="email">{{__('messages.admin.menu.company.company.email')}}</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$company->email}}">
                </div>
                <div class="form-group">
                    <label for="logo">{{__('messages.admin.menu.company.company.logo')}}</label>
                    <input type="file" name="logo" class="form-control-file @error('logo') is-invalid @enderror" value="{{$company->logo}}">
                </div>
                <div class="form-group">
                    <input type="submit" name="create_customer" id="create_customer" value="{{__('messages.admin.menu.company.update-record')}}" class="btn btn-lg btn-success">
                </div>
            </form>
        </div>
    </div>

@endsection
