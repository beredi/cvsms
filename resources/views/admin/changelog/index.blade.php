@extends('layouts.admin')

@section('content')

    <table id="changelog" class="display" style="width:100%">
        <thead>
            <tr>
                <th width="10%">{{__('messages.admin.general.date')}}</th>
                <th>{{__('messages.admin.general.message')}}</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th width="10%">{{__('messages.admin.general.date')}}</th>
                <th>{{__('messages.admin.general.message')}}</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td width="10%">20.12.2021</td>
                <td>
                    <ul>
                        <li>Add vehicle</li>
                        <li>Vehicle configurations</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td width="10%">13.12.2021</td>
                <td>
                    <ul>
                        <li>Car list in database</li>
                        <li>Permissions page</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td width="10%">6.12.2021</td>
                <td>
                    <ul>
                        <li>Created changelog</li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
@endsection

@section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $('#changelog').DataTable();
        });
    </script>
@endsection
