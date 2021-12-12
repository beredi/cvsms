@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-5 col-md-12">
            <h5>{{(__('messages.admin.permissions.title'))}}</h5>
        </div>
    </div>
    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="role">{{ __('messages.admin.menu.employees.employee.user-role') }}</label>
            <div class="control-group">
                <select name="role" required id="role" placeholder="{{__('messages.admin.general.search-for')}}">
                    <option value=""></option>
                    @foreach($roles as $role)
                        <option value="{{$role->slug}}" @if($role->slug == \App\Models\Role::USER) selected @endif>{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>


@endsection

@section('scripts')
    <script>
        $(function (){

            $('#role').selectize();
        });
    </script>
@endsection
