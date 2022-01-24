@extends('layouts.admin')

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('permissions-updated'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{ \Illuminate\Support\Facades\Session::get('permissions-updated') }}
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-5 col-md-12">
            <h5>{{(__('messages.admin.permissions.title'))}}</h5>
        </div>
    </div>
    <form action="{{route('permissions.attach')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="role" class="required">{{ __('messages.admin.menu.employees.employee.user-role') }}</label>
            <div class="control-group">
                <select name="roleSlug" required id="role" placeholder="{{__('messages.admin.general.search-for')}}">
                    <option value=""></option>
                    @foreach($roles as $role)
                        <option value="{{$role->slug}}" @if($role->slug == \App\Models\Role::USER) selected @endif>{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
                @foreach($permissions as $model => $permissionsPerModel)
                    <div class="row">
                        <div class="col-md-12">
                            <strong class="text-success">{{__('messages.admin.menu.'.$model.'.plural_name')}}</strong><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($permissionsPerModel as $slug => $name)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="permissions-checked[]" id="{{$slug}}" value="{{$slug}}" @if($userRole->hasPermission($slug)) checked @endif @if($userRole->name == \App\Models\Role::ADMIN) disabled @endif >
                                <label class="form-check-label" for="{{$slug}}">{{$name}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                @endforeach
        </div>
        <div class="form-group">
            <input type="submit" name="permission_attach" id="permission_attach" value="{{__('messages.admin.general.save')}}" class="btn btn-lg btn-success">
        </div>
    </form>


@endsection

@section('scripts')
    <script>
        $(function (){

            $('#role').selectize();
        });
    </script>
    <script src="{{asset('js/handlers/permissions.js')}}"></script>
@endsection
