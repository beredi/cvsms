@extends('layouts.admin')

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('items-errors'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                {{ \Illuminate\Support\Facades\Session::get('items-errors') }}
            </div>
        </div>
    </div>
    @endif

    @include('admin.includes.breadcrumb', ['route' => 'invoices.all', 'where' => __('messages.admin.menu.invoice.plural_name')])
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-12">
            <h2 class="text-dark">{{__('messages.admin.menu.invoice.name')}} {{$invoice->id}}
            @if($invoice->paid)
                <span class="badge badge-success">{{__('messages.admin.menu.services.service.paid')}}</span>
            @else
                <span class="badge badge-danger">{{__('messages.admin.menu.services.service.unpaid')}}</span>
            @endif
            </h2>
        </div>
        @if(!$invoice->paid)
        <div class="col-md-3 col-sm-12 small">
            <a
                href="{{route('invoices.pay', ['invoice' => $invoice->id])}}"
                class="btn btn-success btn-sm"
            >
                <i class="fas fa-dollar-sign"></i> {{ __('messages.admin.menu.invoice.invoice.paid') }}
            </a>
        </div>
        @endif
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-2 col-sm-12 small mt-1">
            <i class="fas fa-calendar"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.invoice.invoice.date_invoice'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$invoice->date_invoice}}</strong>
        </div>
    </div>
    @if($invoice->paid)
    <hr>
    <div class="row mt-2">
        <div class="col-md-2 col-sm-12 small mt-1">
            <i class="fas fa-calendar"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.invoice.invoice.date-paid'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$invoice->date_paid}}</strong>
        </div>
    </div>
    @endif
    <hr>
    <div class="row mt-2">
        <div class="col-md-2 col-sm-12 small mt-1">
            <i class="fas fa-dollar-sign"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.stock.item.price'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$invoice->getPrice()}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-2 col-sm-12 small mt-1">
            <i class="fas fa-dollar-sign"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.stock.item.price_with_fee'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$invoice->getPrice() * 20 / 100 + $invoice->getPrice()}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-sitemap"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.invoice.invoice-items.plural_name'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            @include('admin.invoice._allInvoiceItems', ['items' => $invoice->invoiceItems, 'invoiceId' => $invoice->id])
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#all-invoice-items').DataTable( {
            "order": []
            } );
        })
    </script>
@endsection
