@isset($hide)
@else
    @php
        $hide = false;
    @endphp
@endisset

<table id='all-invoices' class="display" style="width:100%">
    <thead>
    <tr>
        <th class="text-center" style="width: 5%"><i class="far fa-eye"></i></th>
        <th>ID</th>
        <th>{{__('messages.admin.menu.invoice.invoice.date_invoice')}}</th>
        <th>{{__('messages.admin.menu.invoice.invoice.date-paid')}}</th>
        <th>{{__('messages.admin.menu.invoice.invoice.paid')}}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @if($invoices->isNotEmpty())
        @foreach($invoices as $invoice)
            <tr
            @if($invoice->paid)
                class="bg-success text-white"
            @endif
            >
                <td class="text-center">
                    <a href="{{route('invoices.show', ['invoice' => $invoice->id])}}" class="@if($invoice->paid) text-white @else text-primary @endif" title="{{__('messages.admin.general.show')}}">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
                <td>{{$invoice->id}}</td>
                <td>{{$invoice->date_invoice}}</td>
                <td>{{$invoice->date_paid}}</td>
                <td>
                    @if($invoice->paid)
                        {{__('messages.admin.general.yes')}}
                    @else
                        {{__('messages.admin.general.no')}}
                    @endif
                </td>
                <td class="text-center">
                    @can('delete', $invoice)
{{--                        <a href="#" data-id="{{$service->id}}" class="btn btn-sm btn-danger delete-button"  data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash-alt"></i></a>--}}


                    @endcan
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
