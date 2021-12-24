@extends('layouts.admin')

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('employee-created'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{ \Illuminate\Support\Facades\Session::get('employee-created') }}
                </div>
            </div>
        </div>
    @elseif(\Illuminate\Support\Facades\Session::has('employee-deleted'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    {{ \Illuminate\Support\Facades\Session::get('employee-deleted') }}
                </div>
            </div>
        </div>
    @elseif(\Illuminate\Support\Facades\Session::has('employee-updated'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{ \Illuminate\Support\Facades\Session::get('employee-updated') }}
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <h2 class="float-left">{{__('messages.admin.menu.employees.all-records')}}</h2>
            @can('create', \App\Models\User::class)
            <a href="{{route('employees.create')}}" class="float-right btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> {{__('messages.admin.menu.employees.new-record')}}</a>
            @endcan
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id='all-customers' class="display" style="width:100%">
                <thead>
                <tr>
                    <th>{{__('messages.admin.menu.customers.customer.name')}}</th>
                    <th>{{__('messages.admin.menu.customers.customer.email')}}</th>
                    <th>{{__('messages.admin.menu.customers.customer.phone')}}</th>
                    <th>{{__('messages.admin.menu.customers.customer.address')}}</th>
                    <th>{{__('messages.admin.menu.employees.employee.employed_from')}}</th>
                    <th>{{__('messages.admin.menu.employees.employee.employed_to')}}</th>
                    <th>{{__('messages.admin.menu.employees.employee.user-role')}}</th>
                    <th>{{__('messages.admin.general.edit')}}</th>
                    <th>{{__('messages.admin.general.delete')}}</th>
                </tr>
                </thead>
                <tbody>
                @if($employees->isNotEmpty())
                    @foreach($employees as $employee)
                        <tr>
                            <td><a class="text-secondary" href="{{route('employees.show', ['user' => $employee->id])}}">{{$employee->fullName()}}</a></td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->phone}}</td>
                            <td>{{$employee->address}}</td>
                            <td>{{date('d. m. Y', strtotime($employee->employed_from))}}</td>
                            <td>@if($employee->employed_to !== null){{date('d. m. Y', strtotime($employee->employed_to))}}@endif</td>
                            <td>{{$employee->role->name}}</td>
                            <td class="text-center">
                                @can('update', $employee)
                                <a href="{{route('employees.edit', ['user' => $employee->id])}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                @endcan
                            </td>
                            <td class="text-center">
                                @can('delete', \App\Models\User::class)
                                <a href="#" class="btn btn-sm btn-danger"  data-toggle="modal" data-target="#deleteModal{{$employee->id}}"><i class="fas fa-trash-alt"></i></a>

                                <!-- Delete Modal-->
                                <div class="modal fade" id="deleteModal{{$employee->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{__('messages.admin.general.delete')}}?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">{{__('messages.admin.menu.employees.delete_employee', ['name' => $employee->name, 'lastname' => $employee->lastname])}}</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">{{__('messages.admin.general.cancel')}}</button>
                                                <a class="btn btn-danger" href="#" onclick="event.preventDefault();document.getElementById('delete-form'+{{$employee->id}}).submit();">{{__('messages.admin.general.delete')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form id="delete-form{{$employee->id}}" action="{{route('employees.delete', ['user' => $employee->id])}}" method="POST" class="d-none">
                                    @method('DELETE')
                                    @csrf
                                </form>

                            @endcan
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection
