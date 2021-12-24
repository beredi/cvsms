@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-5 col-md-12">
            <h2>{{__('messages.admin.menu.employees.new-record')}}</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('employees.store') }}">
                @csrf

                <div class="form-group">
                    <label for="name" class="required">{{ __('messages.admin.menu.customers.customer.name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="lastname" class="required">{{ __('messages.admin.menu.customers.customer.lastname') }}</label>
                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="false" autofocus>

                    @error('lastname')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="required">{{ __('messages.admin.menu.customers.customer.email') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="required">{{ __('messages.admin.menu.employees.employee.password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="required">{{ __('messages.admin.menu.employees.employee.password_confirm') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="form-group">
                    <label for="employed_from">{{ __('messages.admin.menu.employees.employee.employed_from') }}</label>
                    <input id="employed_from" type="date" class="form-control @error('employed_from') is-invalid @enderror" name="employed_from" value="{{ old('employed_from') }}">

                    @error('employed_from')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="employed_to">{{ __('messages.admin.menu.employees.employee.employed_to') }}</label>
                    <input id="employed_to" type="date" class="form-control @error('employed_to') is-invalid @enderror" name="employed_to" value="{{ old('employed_to') }}">

                    @error('employed_to')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">{{ __('messages.admin.menu.customers.customer.address') }}</label>
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">

                    @error('address')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">{{ __('messages.admin.menu.customers.customer.phone') }}</label>
                    <input id="phone" type="text" class="form-control @error('address') is-invalid @enderror" name="phone" value="{{ old('phone') }}">

                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="role" class="required">{{ __('messages.admin.menu.employees.employee.user-role') }}</label>
                    <div class="control-group">
                        <select name="role" required id="role" placeholder="{{__('messages.admin.general.search-for')}}">
                            <option value=""></option>
                            @foreach($roles as $role)
                                <option value="{{$role->slug}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            {{ __('messages.admin.menu.employees.new-record') }}
                        </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(function (){

            $('#role').selectize();
        });
    </script>
@endsection
