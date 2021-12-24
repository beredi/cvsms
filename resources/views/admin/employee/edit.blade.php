@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-5 col-md-12">
            <h2>{{__('messages.admin.menu.employees.update-record')}}</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{route('employees.update', ['user' => $employee->id])}}" method="post">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label for="name" class="required">{{ __('messages.admin.menu.customers.customer.name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$employee->name}}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="lastname" class="required">{{ __('messages.admin.menu.customers.customer.lastname') }}</label>
                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{$employee->lastname}}" required autocomplete="false" autofocus>

                    @error('lastname')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="required">{{ __('messages.admin.menu.customers.customer.email') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$employee->email}}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ __('messages.admin.menu.employees.employee.password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">{{ __('messages.admin.menu.employees.employee.password_confirm') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                </div>

                <div class="form-group">
                    <label for="employed_from">{{ __('messages.admin.menu.employees.employee.employed_from') }}</label>
                    @if(auth()->user()->hasRole(\App\Models\Role::ADMIN))
                    <input id="employed_from" type="date" class="form-control @error('employed_from') is-invalid @enderror" name="employed_from" value="{{$employee->employed_from}}">
                    @else
                        <p class="font-weight-bold text-dark">{{date('d.M.Y',strtotime($employee->employed_from))}}</p>
                    @endif

                    @error('employed_from')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="employed_to">{{ __('messages.admin.menu.employees.employee.employed_to') }}</label>
                    <input id="employed_to" type="date" class="form-control @error('employed_to') is-invalid @enderror" name="employed_to" value="{{$employee->employed_to}}">

                    @error('employed_to')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">{{ __('messages.admin.menu.customers.customer.address') }}</label>
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$employee->address}}">

                    @error('address')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">{{ __('messages.admin.menu.customers.customer.phone') }}</label>
                    <input id="phone" type="text" class="form-control @error('address') is-invalid @enderror" name="phone" value="{{$employee->phone}}">

                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                @if(\Illuminate\Support\Facades\Auth::user()->hasRole(\App\Models\Role::ADMIN))
                <div class="form-group">
                    <label for="role">{{ __('messages.admin.menu.employees.employee.user-role') }}</label>
                    <div class="control-group">
                        <select name="role" required id="role" placeholder="{{__('messages.admin.general.search-for')}}">
                            <option value=""></option>
                            @foreach($roles as $role)
                                <option value="{{$role->slug}}"
                                @if($employee->role->slug == $role->slug)
                                    selected
                                @endif
                                >{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endif

                <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            {{ __('messages.admin.menu.employees.update-record') }}
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
