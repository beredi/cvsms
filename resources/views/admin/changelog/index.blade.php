@extends('layouts.admin')

@section('content')

    <table id="changelog" class="display" style="width:100%">
        <thead>
            <tr>
                <th width="10%">{{__('messages.admin.general.date')}}</th>
                <th width="10%">{{__('messages.admin.general.version')}}</th>
                <th>{{__('messages.admin.general.message')}}</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th width="10%">{{__('messages.admin.general.date')}}</th>
                <th>{{__('messages.admin.general.version')}}</th>
                <th>{{__('messages.admin.general.message')}}</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td width="10%">02. 02. 2022</td>
                <td width="10%">Beta 1.14</td>
                <td>
                    <ul>
                        <li>Services - Added logic to service edit (price and paid changes)</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td width="10%">01. 02. 2022</td>
                <td width="10%">Beta 1.13</td>
                <td>
                    <ul>
                        <li>Customer - added owe to customer show</li>
                        <li>Services - added paid</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td width="10%">30. 01. 2022</td>
                <td width="10%">Beta 1.12</td>
                <td>
                    <ul>
                        <li>Added favicon</li>
                        <li>Set localization on login</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td width="10%">24.01.2022</td>
                <td width="10%">Beta 1.11</td>
                <td>
                    <ul>
                        <li>Permissions- disabled checkboxes for admin permissions</li>
                        <li>Translated to Serbian</li>
                        <li>Vehicles - chassis num changed to string</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td width="10%">23.12.2021</td>
                <td width="10%">Beta 1.10</td>
                <td>
                    <ul>
                        <li>Breadcrumbs to show pages</li>
                        <li>Shows for vehicle, service, customer</li>
                        <li>Services - complete</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td width="10%">21.12.2021</td>
                <td width="10%">Beta 1.04</td>
                <td>
                    <ul>
                        <li>Update vehicle</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td width="10%">20.12.2021</td>
                <td width="10%">Beta 1.03</td>
                <td>
                    <ul>
                        <li>Delete vehicle</li>
                        <li>Add vehicle</li>
                        <li>Vehicle configurations</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td width="10%">13.12.2021</td>
                <td width="10%">Beta 1.02</td>
                <td>
                    <ul>
                        <li>Car list in database</li>
                        <li>Permissions page</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td width="10%">6.12.2021</td>
                <td width="10%">Beta 1.01</td>
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
            $('#changelog').DataTable({
                ordering: false
            });
        });
    </script>
@endsection
